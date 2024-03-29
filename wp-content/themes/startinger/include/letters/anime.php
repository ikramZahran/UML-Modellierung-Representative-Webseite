<?php if( ! defined( 'ABSPATH' ) ) exit;

/*******************************
* Enqueue scripts and styles.
********************************/
 
function startinger_anima_scripts() {
	if( !get_theme_mod('startinger_header_animation') ) {
		wp_enqueue_style( 'startinger-anima-css', get_template_directory_uri() . '/include/letters/anime.css');
		wp_enqueue_script( 'startinger-anima-js', get_template_directory_uri() . '/include/letters/anime.js', array( 'jquery' ), true);
		wp_enqueue_script( 'startinger-anima-custom-js', get_template_directory_uri() . '/include/letters/anime-custom.js', array( 'jquery' ), '7638488', true);
	}
		
}

add_action( 'wp_enqueue_scripts', 'startinger_anima_scripts' );



