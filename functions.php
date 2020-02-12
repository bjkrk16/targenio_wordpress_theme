<?php

add_theme_support( 'post-thumbnails' );

function targenio_theme_assets() {

    wp_enqueue_style('style', get_stylesheet_uri());

    // wp_register_style( 'Muli', get_template_directory_uri() . '/dist/fonts/Muli-VariableFont:wght.ttf' );
    wp_enqueue_style( 'targenio_wordpress-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'targenio_wordpress-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array(), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'targenio_theme_assets');


function startwordpress_google_fonts() {
    wp_register_style('Muli', 'https://fonts.googleapis.com/css?family=Muli:300,800&display=swap');
    wp_enqueue_style( 'Muli' );
}
add_action('wp_print_styles', 'startwordpress_google_fonts');


register_nav_menus( array( 
    'primary' => __('Primary Menu'),
    'footer-nav' => __('Footer Menu') 
) );