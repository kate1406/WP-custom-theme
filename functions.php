<?php 

//f-ija koja dodaje dinamicni title tag
function kety_theme_support(){
    add_theme_support('title-tag'); //dodajem dinamični title-tag
    add_theme_support('custom-logo'); //dodajem dinamični logo
    // ovime omogucujemo ubacivanje thumbnails-a, omogućujemo featured image u wp
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'kety_theme_support');  //moramo dodati funkciju u hook koji se zove after theme setup, kad wp pokrene hook nek odmah pokrene i moju f-iju

//f-ija koja dodaje opciju menija (s 2 menu izbora)
function kety_menus(){
//array koji se zove locations, i unutra su key-values: 'lokacija menija'-'naziv menija'
    $locations = array(
        'primary'=> "Top Menu",
        'footer' => "Footer Menu"
    );
//moram dodati register_nav_menus i proslijediti locations
register_nav_menus($locations); 

}

add_action('init',  'kety_menus'); // dodati f-iju u hook koji se zove init 

//f-ija za svg 
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');


    //enf f-ija za svg

//f-ija koja uključuje tj. registrira style u header
function kety_register_styles(){

    //kreirala sam varijablu za version theme, nije hardkodirana
    $version = wp_get_theme()->get('Version');

    //ovdje sam stavila dependency za bootstrap, tako da će se on prvi učitati. Prvo se učita bootstrap pa moj. Moj custom style override-a bootstrap.
    //funkcija za enqueue style('ime proizvoljno za stylesheet', 'url za stylesheet spojiš sa . i path za style', prazan array, verzija dinamički,)
    wp_enqueue_style('kety_custom_style', get_template_directory_uri() . "/style.css", array('kety_bootstrap'), $version, 'all');
    //gore je prazan array prvo, to je array dependencies, tj moj kety_custom_style je dependent on kety_bootstrap, pa sam to unijela u array gore
    wp_enqueue_style('kety_bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('kety_fontawesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.4.1', 'all');

}

//moramo funkciju ubacit (hook) u wp sistem sa add action ('naziv hooka', 'naziv funkcije'). Kada wp pokrene ovaj hook, pokreni i moju f-iju
add_action('wp_enqueue_scripts', 'kety_register_styles');


//f-ija koja dodaje scripts u footer
function kety_register_scripts(){
//true znači da će ju prikazati u footer
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




?>  