<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Happy Lives</title>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="">
	<meta name="description" content="">
	<meta itemprop="image" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="google-site-verification" content="" />

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:creator" content="">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/share.png">

	<!-- Open Graph data -->
	<meta property="og:title" content="">
	<meta property="og:type" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/share.png">
	<meta property="og:description" content="">
    <?php wp_head(); ?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/favicon-16x16.png">
	<!-- <link rel="manifest" href="<?php echo bloginfo( 'template_directory' ); ?>/favicon/manifest.json"> -->
	<meta name="msapplication-TileColor" content="#4D437B">
	<meta name="msapplication-TsileImage" content="<?php echo bloginfo( 'template_directory' ); ?>/ms-icon-144x144.png">
	<meta name="theme-color" content="#4D437B">
</head>

<body <?php body_class(); ?>>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark hl-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo home_url('/');?>">
				<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/logo.png" alt="Happy Lives">
			</a>

			<button type="button" class="toggle-mobile-search search-icon d-md-none">
				<img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/search-icon.svg'; ?>" alt="search">
			</button>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="col-12 py-5 search-input d-md-none" style="display:none;">
				<form class="row">
					<div class="col-12 mb-3">
						<input name="s" type="search" class="form-control" placeholder="<?php echo pll__('Buscar experiencia, lugar, categoría'); ?>" value="<?php echo get_search_query(); ?>">
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-secondary btn-block">Buscar</button>
					</div>
				</form>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'menu'       => 'header-menu',
                        'menu_class' => 'navbar-nav ml-auto',
                        'container'  => 'false'
                    ) );
                ?>
			</div>
		</div>
	</nav>