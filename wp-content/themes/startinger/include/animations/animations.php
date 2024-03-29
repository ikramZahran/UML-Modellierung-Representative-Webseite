<?php if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue scripts and styles.
 */
function startinger_animations_scripts() {	
	wp_enqueue_style( 'startinger-aos-css', get_template_directory_uri() . '/include/animations/aos.css' );
	wp_enqueue_script( 'startinger-aos-js', get_template_directory_uri() . '/include/animations/aos.js', array(), '', true);
	wp_enqueue_script( 'startinger-aos-options-js', get_template_directory_uri() . '/include/animations/aos-options.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'startinger_animations_scripts' );

function  startinger_animation ($animation) {
	if ( get_theme_mod( $animation ) != "none" and get_theme_mod( $animation ) != ""  )  {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='".esc_html ( get_theme_mod( $animation ) )."'";
	}
	if ( get_theme_mod( $animation  ) == "" ) {
		return "data-aos-delay='100'"." ".
		"data-aos-duration='500'"." ".
		"data-aos='flip-up'";		
	}
}

function startinger_animations() {
	$array = array(
				'' => esc_attr__( 'Default', 'startinger' ),			
				'none' => esc_attr__( 'Deactivate Animation', 'startinger' ),			
				'fade' => esc_attr__( 'fade', 'startinger' ),
				'fade-up' => esc_attr__( 'fade-up', 'startinger' ),
				'fade-down' => esc_attr__( 'fade-down', 'startinger' ),
				'fade-left' => esc_attr__( 'fade-left', 'startinger' ),
				'fade-right' => esc_attr__( 'fade-right', 'startinger' ),
				'fade-up-right' => esc_attr__( 'fade-up-right', 'startinger' ),
				'fade-up-left' => esc_attr__( 'fade-up-left', 'startinger' ),
				'fade-down-right' => esc_attr__( 'fade-down-right', 'startinger' ),
				'fade-down-left' => esc_attr__( 'fade-down-left', 'startinger' ),
				'flip-up' => esc_attr__( 'flip-up', 'startinger' ),
				'flip-down' => esc_attr__( 'flip-down', 'startinger' ),
				'flip-left' => esc_attr__( 'flip-left', 'startinger' ),
				'flip-right' => esc_attr__( 'flip-right', 'startinger' ),
				'slide-up' => esc_attr__( 'slide-up', 'startinger' ),
				'slide-down' => esc_attr__( 'slide-down', 'startinger' ),
				'slide-left' => esc_attr__( 'slide-left', 'startinger' ),
				'slide-right' => esc_attr__( 'slide-right', 'startinger' ),
				'zoom-in' => esc_attr__( 'zoom-in', 'startinger' ),
				'zoom-in-up' => esc_attr__( 'zoom-in-up', 'startinger' ),
				'zoom-in-down' => esc_attr__( 'zoom-in-down', 'startinger' ),
				'zoom-in-left' => esc_attr__( 'zoom-in-left', 'startinger' ),
				'zoom-in-right' => esc_attr__( 'zoom-in-right', 'startinger' ),
				'zoom-out' => esc_attr__( 'zoom-out', 'startinger' ),
				'zoom-out-up' => esc_attr__( 'zoom-out-up', 'startinger' ),
				'zoom-out-down' => esc_attr__( 'zoom-out-down', 'startinger' ),
				'zoom-out-left' => esc_attr__( 'zoom-out-left', 'startinger' ),
				'zoom-out-right' => esc_attr__( 'zoom-out-right', 'startinger' ),
				);
	return $array;
}


		function startinger_sanitize_animations( $input ) {

			$valid = startinger_animations();

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
function startinger_animations_customize_register( $wp_customize ) {
 
		$wp_customize->add_panel( 'startinger_panel_animations' , array(
			'title'       => __( 'Animations', 'startinger' ),
			'priority'   => 1,
		) );


/************************************
* Animation Articles
************************************/

		$wp_customize->add_section( 'startinger_animations_section_articles' , array(
			'title'       => __( 'Animation Articles', 'startinger' ),
			'panel'       => 'startinger_panel_animations',
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'startinger_articles_animation', array (
			'sanitize_callback' => 'startinger_sanitize_animations',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'startinger_articles_animation', array(
			'label'    => __( 'Animation Articles', 'startinger' ),
			'section'  => 'startinger_animations_section_articles',
			'settings' => 'startinger_articles_animation',
			'type'     =>  'select',
            'choices'  => startinger_animations(),		
		) ) );
		
}
add_action( 'customize_register', 'startinger_animations_customize_register' );
