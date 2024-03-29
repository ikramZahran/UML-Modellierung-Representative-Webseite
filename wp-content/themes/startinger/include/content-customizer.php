<?php if( ! defined( 'ABSPATH' ) ) exit;

function startinger_customize_register_content( $wp_customize ) {
		
/**
 * Recent Posts
 */
		$wp_customize->add_section( 'seos_content_section' , array(
			'title'       => __( 'Content Options', 'startinger' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
 		$wp_customize->add_setting( 'content_max_width', array (
            'default' => 1210,		
			'sanitize_callback' => 'absint',
		) );
				
		 $wp_customize->add_control( 'content_max_width', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_max_width',
		  'label' => __( 'Content max width', 'startinger' ),
		  'input_attrs' => array(
			'min' => 1210,
			'max' => 2000,
			'step' => 1,
		  ),
		) );
 
 		$wp_customize->add_setting( 'content_padding', array (
            'default' => 0,		
			'sanitize_callback' => 'absint',
		) );
				
		 $wp_customize->add_control( 'content_padding', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_padding',
		  'label' => __( 'Content Padding', 'startinger' ),
		  'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		  ),
		) );

 		$wp_customize->add_setting( 'hide_home_content', array (
            'default' => '',		
			'sanitize_callback' => 'startinger_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_home_content', array(
			'label'    => __( 'Hide sidebar and content on home page', 'startinger' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_home_content',
			'type' => 'checkbox',
		) ) );		
}
add_action( 'customize_register', 'startinger_customize_register_content' );


/********************************************
* Content Styles
*********************************************/ 	

function startinger_content_styles () {

        $content_max_width = esc_attr(get_theme_mod( 'content_max_width' ) );
        $hide_home_content = esc_attr(get_theme_mod( 'hide_home_content' ) );
        $content_padding = esc_attr(get_theme_mod( 'content_padding' ) );
        $homepage_columns = esc_attr(get_theme_mod( 'homepage_columns' ) );

		if( $content_max_width ) { $content_max_width_style = "#content,.h-center {max-width: {$content_max_width}px !important;}";} else {$content_max_width_style ="";}
		if( $hide_home_content and ( is_front_page() ) ) { $hide_home_content_style = ".home #content #primary, .home #content #secondary {display: none !important;}";} else {$hide_home_content_style ="";}
		if( $content_padding ) { $content_padding_style = "#content,.h-center {padding: {$content_padding}px !important;}";} else {$content_padding_style ="";}
		if( $homepage_columns == "1" and is_home()) { $homepage_columns_style1 = ".home article {width: 100%;}";} else {$homepage_columns_style1 ="";}
		if( $homepage_columns == "2" and is_home()) { $homepage_columns_style2 = ".home article {width: 45%;}";} else {$homepage_columns_style2 ="";}

		
        wp_add_inline_style( 'startinger-style-css', 
		$content_max_width_style.$hide_home_content_style.$content_padding_style.$homepage_columns_style1.$homepage_columns_style2
		);
}
add_action( 'wp_enqueue_scripts', 'startinger_content_styles' );