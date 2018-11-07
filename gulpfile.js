const gulp = require('gulp')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const sass = require('gulp-sass')
const maps = require('gulp-sourcemaps')
const del = require('del')
const nodemon = require('nodemon')
const autoprefixer = require('gulp-autoprefixer')
const browserSync = require('browser-sync').create()
const cssmin = require('gulp-cssmin')
const replace = require('gulp-replace')
const zip = require('gulp-zip')
const install = require('gulp-install')

const args = ((argList) => {
	const res = {}
	let opt
	let thisOpt
	let curOpt
	for (let a = 0; a < argList.length; a += 1) {
		thisOpt = argList[a].trim()
		opt = thisOpt.replace(/^\-+/, '')
		if (opt === thisOpt) {
			if (curOpt) res[curOpt] = opt
			curOpt = null
		}
		else {
			curOpt = opt
			res[curOpt] = true
		}
	}
	return res
})(process.argv)

const cleanBuild = (cb) => {
	del(['build'])
	cb()
}

const cleanDist = (cb) => {
	del(['dist'])
	cb()
}

const clean = gulp.parallel(cleanBuild, cleanDist)

const concatScripts = () => gulp.src([
	'assets/js/lib/jquery-3.3.1.min.js',
	'assets/js/lib/popper.min.js',
	'assets/js/lib/bootstrap.min.js',
	'assets/js/lib/jquery.fancybox.min.js',
	'assets/js/lib/smooth-scroll.min.js',
	'assets/js/lib/parsley.min.js',
	'assets/js/functions.js',
])
	.pipe(maps.init())
	.pipe(concat('main.js'))
	.pipe(uglify())
	.pipe(maps.write('./'))
	.pipe(gulp.dest('build/js'))

const compileSass = () => gulp.src('assets/css/main.scss')
	.pipe(maps.init())
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer())
	.pipe(cssmin())
	.pipe(maps.write('./'))
	.pipe(gulp.dest('build/css'))

const moveViews = (relative = true) => () => gulp.src('views/*.html')
	.pipe(replace('{SERVER_PATH}', args.env === 'Production' && !relative ? args.assetsPath : ''))
	.pipe(gulp.dest('build/views'))

const moveAssets = gulp.series(() => gulp.src(['assets/favicon/*'])
	.pipe(gulp.dest('build/favicon/')), () => gulp.src(['assets/img/*'])
	.pipe(gulp.dest('build/img/')))

const moveAppjs = () => gulp.src('app.js')
	.pipe(gulp.dest('build/'))

const build = relative => gulp.series(gulp.parallel(compileSass, concatScripts), gulp.parallel(moveAppjs, moveViews(relative), moveAssets))

const zipAll = gulp.series(
	cleanBuild,
	build(),
	() => gulp.src(['build/**/*', '!build/node_modules', 'package.json'])
		.pipe(gulp.dest('dist/full')),
	() => gulp.src(['dist/full/**/*'])
		.pipe(install({ production: true })),
	() => gulp.src(['dist/full/**/*'])
		.pipe(zip('full.zip'))
		.pipe(gulp.dest('dist')),
)

const buildS3 = gulp.series(
	cleanBuild,
	build(),
	() => gulp.src(['build/js/**/*', 'build/css/**/*', 'build/favicon/**/*', 'build/img/**/*'], { base: 'build' })
		.pipe(gulp.dest('dist/s3')),
)

const zipElb = gulp.series(
	cleanBuild,
	build(false),
	gulp.parallel(
		() => gulp.src(['build/views/**/*'], { base: 'build' })
			.pipe(gulp.dest('dist/elb')),
		() => gulp.src(['build/app.js', '!build/node_modules', 'package.json'])
			.pipe(gulp.dest('dist/elb')),
	),
	() => gulp.src(['dist/elb/**/*'])
		.pipe(install({ production: true })),
	() => gulp.src(['dist/elb/**/*'])
		.pipe(zip('elb.zip'))
		.pipe(gulp.dest('dist')),
)

const nodemonTask = (cb) => {
	gulp.src('node_modules/*').pipe(gulp.dest('build/node_modules'))
	let callbackCalled = false
	return nodemon({ script: 'build/app.js' }).on('start', () => {
		if (!callbackCalled) {
			callbackCalled = true
			cb()
		}
	})
}

const serve = gulp.series(clean, build(), nodemonTask, () => {
	browserSync.init({
		proxy: 'http://localhost:5000',
	})
	gulp.watch('app.js', moveAppjs).on('change', browserSync.reload)
	gulp.watch('assets/css/**/*.scss', compileSass).on('change', browserSync.reload)
	gulp.watch('assets/js/*.js', concatScripts).on('change', browserSync.reload)
	gulp.watch(['views/*.html'], moveViews()).on('change', browserSync.reload)
})

const dist = gulp.series(cleanDist, zipAll, zipElb, buildS3)

module.exports.serve = serve

module.exports.dist = dist

module.exports.clean = clean
