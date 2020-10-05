<?php 

function kety_theme_support(){
    add_theme_support('title-tag'); 
    add_theme_support('custom-logo'); 
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'kety_theme_support'); 

function kety_menus(){
    $locations = array(
        'primary'=> "Top Menu",
        'footer' => "Footer Menu"
    );
register_nav_menus($locations); 

}

add_action('init',  'kety_menus'); 

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

function kety_register_styles(){

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('kety_custom_style', get_template_directory_uri() . "/style.css", array('kety_bootstrap'), $version, 'all');
    wp_enqueue_style('kety_bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('kety_fontawesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.4.1', 'all');
}

add_action('wp_enqueue_scripts', 'kety_register_styles');

function kety_register_scripts(){

 wp_enqueue_script('kety_jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);  
 wp_enqueue_script('kety_popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
 wp_enqueue_script('kety_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
 wp_enqueue_script('kety_main_js', get_template_directory_uri() . "/assets/js/kety.js",  array(), 1.0, true);
}
add_action('wp_enqueue_scripts', 'kety_register_scripts');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );