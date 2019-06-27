<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
	<div class="container-fluid home">
		<div class="row">
			<div id="carouselExampleSlidesOnly" class="col-12 p-0 homecarousel carousel slide" data-ride="carousel">
				<div class="col-12 home-search">
					<div class="row">
						<h1 class="col-12 text-center">Vive las mejores experiencias</h1>
					</div>
					<div class="row justify-content-center">
						<div class="col-10 col-md-5">
							<input class="form-control" type="text" placeholder="Buscar">
						</div>
						<button class="col-2 col-md-1 btn btn-primary" type="submit">Buscar</button>
					</div>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block w-100" alt="...">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container home">
		<div class="row mt-5">
			<h2 class="col-12">Categorías</h2>
		</div>
		<div class="row justify-content-between home-categories mt-3">
			<?php
				$order = 'asc';
				$hide_empty = false ;
				$cat_args = array(
					'orderby'    => $orderby,
					'order'      => $order,
					'hide_empty' => $hide_empty,
				);
				
				$product_categories = get_terms( 'product_cat', $cat_args );
				
				if( !empty($product_categories) ){
					foreach ($product_categories as $key => $category) {	
						if($category->name != 'Uncategorized'){
								$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								echo '<a class="home-category" href="'.get_term_link($category).'" >';
									if($image){
										echo '<img src="'.$image.'">';
									}
									echo '<span class="category-text">';
									echo $category->name;
									echo '</span>';
								echo '</a>';
						}
					}
				}
			?>
		</div>
		<div class="row mt-5 my-3">
			<h2 class="col-12">Mejores valorados</h2>
		</div>
		<div class="row justify-content-between">
			<a href="#" class="col-12 col-md-2 product lg-size">
				<div class="img-wrapper">
					<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				</div>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un
					viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-2 product lg-size">
				<div class="img-wrapper">
					<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				</div>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un
					viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-2 product lg-size">
				<div class="img-wrapper">
					<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				</div>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un
					viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-2 product lg-size">
				<div class="img-wrapper">
					<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				</div>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un
					viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-2 product lg-size">
				<div class="img-wrapper">
					<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				</div>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un
					viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
		</div>
		<div class="row">
			<div class="col-12">
				<a class="link-item" href="#">Mostrar todos <span>(20)</span></a>
			</div>
		</div>
		<div class="row mt-5 mb-3">
			<h2 class="col-12">Sorprende a quien más quieres</h2>
		</div>
		<div class="row">
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan paraiso travel</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan Clásico</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
		</div>
		<div class="row">
			<div class="col-12">
				<a class="link-item" href="#">Mostrar todos <span>(20)</span></a>
			</div>
		</div>
		<div class="row mt-5 mb-3">
			<h2 class="col-12">No te pierdas estos descuentos</h2>
		</div>
		<div class="row">
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan paraiso travel</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan Clásico</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
		</div>
		<div class="row">
			<div class="col-12">
				<a class="link-item" href="#">Mostrar todos <span>(20)</span></a>
			</div>
		</div>
		<div class="row mt-5 mb-3">
			<h2 class="col-12">Experiencias</h2>
		</div>
		<div class="row">
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan paraiso travel</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<h6 class="mt-3">Plan Clásico</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
		</div>
		<div class="row">
			<div class="col-12">
				<a class="link-item" href="#">Mostrar todos <span>(20)</span></a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
