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
					<form role="search" method="get"  class="row justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="col-10 col-md-5 form-control" type="text" placeholder="<?php echo pll__('Buscar experiencia, lugar, categoría'); ?>" value="<?php echo get_search_query(); ?>" name="s">
						<input type="hidden" name="post_type" value="product" />
						<button class="col-10 col-md-1 mt-2 mt-md-0 btn btn-primary" type="submit">Buscar</button>
					</form>
				</div>
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
					<li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="carousel-caption">
							<h1>Vive las mejores experiencias</h1>
						</div>
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block" alt="...">
					</div>
					<div class="carousel-item">
						<div class="carousel-caption">
							<h2>Otro Caption</h2>
						</div>
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block" alt="...">
					</div>
					<div class="carousel-item">
						<div class="carousel-caption">
							<h2>Tercer caption</h2>
						</div>
						<img src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/homeslider.png" class="d-block" alt="...">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
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
		<div class="row justify-content-between responsive">
			<?php 
				// The tax query
				$meta_query  = WC()->query->get_meta_query();
				$tax_query   = WC()->query->get_tax_query();

				$tax_query[] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN', // or 'NOT IN' to exclude feature products
				);

			

				// The query
				$query = new WP_Query( array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => -1,
					'orderby'             => $orderby,
					'order'               => $order == 'asc' ? 'asc' : 'desc',
					'tax_query'           => $tax_query // <===
				) ); 

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post(); global $product;
						echo '<div class="item">';
							echo '<a href="'.get_permalink($query->post->ID ).'"  class="col-12 product lg-size">';
								echo '<div class="img-wrapper">';
									echo '<div class="img-container">';
										if(get_the_post_thumbnail_url( $query->post->ID, 'shop_catalog' )){
											echo '<img src="'. get_the_post_thumbnail_url( $query->post->ID, 'shop_catalog' ) .'" alt="">';
										} else {
										echo '<img src="'. wc_placeholder_img_src( 'full' ) .'" alt="">'; 
										}
									echo '</div>';
								echo '</div>';
								echo '<h6 class="mt-3">'.get_the_title().'</h6>';
								echo '<p class="description">'. get_the_excerpt() .'</p>';
								echo '<p class="price">'. $product->get_price_html().' '.get_woocommerce_currency().'</p>';
							echo '</a>';
						echo '</div>';
					endwhile;
					wp_reset_query(); 
				}
			?>
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
				<p class="discount">30% Dcto</p>
				<h6 class="mt-3">Viaje sorpresa</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<p class="discount">30% Dcto</p>
				<h6 class="mt-3">Plan paraiso travel</h6>
				<p class="description">Escappy Travel conecta tus deseos de vivir nuevas experiencias, con destinos
					sorpresa, en un viaje. 24 horas antes de partir sabrás la ruta diseñada para ti.</p>
				<p class="price">$65.000</p>
			</a>
			<a href="#" class="col-12 col-md-4 product">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_directory' ); ?>/assets/img/experience1.png">
				<p class="discount">30% Dcto</p>
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
