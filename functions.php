<?php

remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'title-tag' );

add_filter( 'show_admin_bar', '__return_false' );

//add support woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

function theme_styles() {
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {
    global $wp_scripts;  
    wp_deregister_script('jquery');   
    wp_enqueue_script( 'main_js', get_template_directory_uri() .'/assets/js/main.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* 
* Register menus
*/ 
function register_theme_menus() {
    register_nav_menus(
        array(
            'header-menu'       => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );


// MiniCart ===========

function add_search_form($items, $args) {
    if( $args->theme_location == 'header-menu' ){
    $items .=   '<li class="nav-item d-none d-md-block">'
                    . '<form class="col-auto search-input">'
                        .'<div class="row">'
                            .'<input name="s" type="search" class="col-12 form-control" placeholder="'. pll__('Buscar experiencia, lugar, categoría') .'" value="'.get_search_query().'">'
                            . '<button type="submit" href="#" class="search-icon">'
                                . '<img class="img-fluid" src="'. get_template_directory_uri() .'/assets/img/search-icon.svg" alt="search">'
                            . '</button>'
                        .'</div>'
                    . '</form>'
                .'</li>'
              . '<li class="nav-item d-none d-md-block">'
                    . '<a href="'. wc_get_cart_url(). '"  class="nav-link cart-icon">'
                        . '<img class="img-fluid" src="'. get_template_directory_uri() .'/assets/img/shopping-cart-icon.svg" alt="cart">'
                        . '<span class="cart-quantity">'. WC()->cart->cart_contents_count .'</span>'
                        . '<span class="cart-price">'. WC()->cart->get_cart_total() .'</span>'
                    . '</a>'
              .'</li>';
        if ( is_user_logged_in() ) { 
            $items .=   '<li class="nav-item dropdown">'
                            .'<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                                . wp_get_current_user()->display_name
                            .'</a>'
                            .'<div class="dropdown-menu" aria-labelledby="navbarDropdown">'
                                .'<a class="dropdown-item" href='. get_permalink( get_option('woocommerce_myaccount_page_id') ). '">Mi cuenta</a>'
                                .'<div class="dropdown-divider"></div>'
                                .'<a class="dropdown-item" href="'. wp_logout_url() .'">'. pll__('Logout') .'</a>'
                            .'</div>'
                        .'</li>';
        } 
        else { 
            $items .= '<li class="nav-item">'
                .'<a class="nav-link" href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ) .'" title="'. pll__('Login / Register','woothemes').'">'. pll__('Login / Register','woothemes') .'</a>'
            .'</li>';
        }
    }
  return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

// WIDGETS
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sponsors',
		'id'            => 'sponsors_web',
		'before_widget' => '<div class="col-10">',
		'after_widget'  => '</div>'
    ) );
    register_sidebar( array(
		'name'          => 'spread_the_sead',
		'id'            => 'spread_the_sead',
		'before_widget' => '<div class="col-6 col-md-4 spread-item">',
		'after_widget'  => '</div>'
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="mt-5 mb-3" aria-label="breadcrumb" itemprop="breadcrumb"><ol class="breadcrumb">',
            'wrap_after'  => '</ol></nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Inicio', 'breadcrumb', 'woocommerce' ),
        );
}

// Display only parent products

function so_27975262_product_query( $q ){
    $q->set( 'post_parent', 0 );
}
add_action( 'woocommerce_product_query', 'so_27975262_product_query', 10, 2  );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/**
 * Remove add to cart button from shop and category page 
 * */
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function remove_add_to_cart_buttons() {
  if( is_product_category() || is_shop()) { 
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
  }
}

/**
 * Add the product's short description (excerpt) to the WooCommerce shop/category pages. The description displays after the product's name, but before the product's price.
 */
function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;
	if ( ! $product->post->post_excerpt ) return;
	?>
	<div itemprop="description">
		<?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);

/**
 * Add bootstrap classes to checkout fields
 */
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group'; 

            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
}

add_filter('woocommerce_form_field_args', function ($args, $key, $value) {
    $args['input_class'][] = 'form-control';
    $args['class'][] = 'form-group';
    return $args;
}, 10, 3);

// Modify the subscriptions error
function my_woocommerce_add_error( $error ) {
	switch ( $error ) {
		case( '<strong>Billing First Name</strong> is a required field.' ):
			$error = "El campo <strong>NOMBRES</strong> es requerido.";
			break;
		case( '<strong>Billing Last Name</strong> is a required field.' ):
			$error = "El campo <strong>APELLIDOS</strong> es requerido.";
			break;
		case( '<strong>Billing Email Address</strong> is a required field.' ):
			$error = "El campo <strong>EMAIL</strong> es requerido.";
			break;
		case( '<strong>Billing Phone</strong> is a required field.' ):
			$error = "El campo <strong>TELÉFONO</strong> es requerido.";
			break;
		case( '<strong>Billing Address</strong> is a required field.' ):
			$error = "El campo <strong>DIRECCIÓN</strong> es requerido.";
			break;
		case( '<strong>Billing Town / City</strong> is a required field.' ):
			$error = "El campo <strong>CIUDAD</strong> es requerido.";
			break;
		case( '<strong>Billing State / County</strong> is a required field.' ):
			$error = "El campo <strong>ESTADO</strong> es requerido.";
			break;
		case( 'Invalid payment method.'):
			$error = "Método de pago invalido.";
			break;
	}
	return $error;
}
add_filter( 'woocommerce_add_error', 'my_woocommerce_add_error' );

// Modify the default WooCommerce orderby dropdown
function patricks_woocommerce_catalog_orderby( $orderby ) {
    $orderby["menu_order"] = __('Predeterminado', 'woocommerce');
    $orderby["relevance"] = __('Afinidad', 'woocommerce');
	$orderby["popularity"] = __('Ordenar por popularidad', 'woocommerce');
	$orderby["rating"] = __('Ordenar por rating', 'woocommerce');
	$orderby["date"] = __('Ordenar por fecha: nuevo a antiguo', 'woocommerce');
	$orderby["price"] = __('Ordenar por precio: bajo a alto', 'woocommerce');
	$orderby["price-desc"] = __('Ordenar por precio: alto a bajo', 'woocommerce');
	return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "patricks_woocommerce_catalog_orderby", 20 );

/* Agregar al carrito*/
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_single_add_to_cart_text' );
function custom_single_add_to_cart_text() {
	return pll__('Add To Cart');
}

// Remove product category/tag meta from its original position
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// Add product meta in new position
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );


//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_product_thumbnails', 'woocommerce_output_product_data_tabs', 10 );

?>