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

function register_theme_menus() {
    register_nav_menus(
        array(
            'header-menu'       => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );

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

?>