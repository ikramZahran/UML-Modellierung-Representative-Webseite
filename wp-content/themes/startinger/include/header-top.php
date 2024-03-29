<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Header Top
 *
 */
function startinger_header () {
?>
<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
<div id="grid-top" class="grid-top">

	<!-- Site Navigation  -->
	<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
	<div class="mobile-cont">
		<div class="mobile-logo" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
				<?php the_custom_logo(); ?>
		</div>
	</div>
	<div class="mobile-setiles">
	    <?php
		do_action( 'startinger_header_search_top_mobile' );
		do_action( 'startinger_header_woo_cart' );
		do_action( 'startinger_header_my_account' );
		
		?>
	</div>	
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
				<?php the_custom_logo(); ?>
		</div>	
		<button class="menu-toggle"><?php esc_html_e( 'Menu', 'startinger' ); ?></button>
		<?php wp_nav_menu( array( 
		'theme_location' => 'primary',
		'menu_id' => 'primary-menu',
		'items_wrap' => '
		<ul id="%1$s" class="%2$s">%3$s 
			'.do_action( 'startinger_header_search_top' )
			.do_action( 'startinger_header_woo_cart' ).'
		</ul>'		
		) ); ?>
	</nav><!-- #site-navigation -->

</div>
	
	<!-- Header Image  -->
	<div class="all-header">
	    <div class="s-shadow"></div>
	    <div class="s-hidden">
		<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
		<img id="masthead" style="<?php startinger_heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.jpg'; ?>' alt="<?php esc_attr_e( 'header image','startinger' ); ?>"/>	
		<?php } ?>
		<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
		<img id="masthead" style="<?php startinger_heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'startinger_value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','startinger' ); ?>"/>	
		<?php } else { ?>
		<div id="masthead" class="header-image" style="<?php startinger_heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'startinger_value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
		<?php } ?>
</div>
		<div class="site-branding">
		
		<?php if ( display_header_text() == true ) { ?>
			<span class="ml15">
			<?php
			
			if ( is_front_page() && is_home() ) :
				?>
					<h1 class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="word"><?php bloginfo( 'name' ); ?></span></a></h1>

					<?php
				else :
					?>
					<p class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="word"><?php bloginfo( 'name' ); ?></span></a></p>
					
					<?php
				endif;
				$startinger_description = esc_html(get_bloginfo( 'description', 'display' ) );
				if ( $startinger_description || is_customize_preview() ) :
					?>    
					<p class="site-description" itemprop="headline">
						<span class="word"><?php echo esc_html($startinger_description); ?></span>
					</p>

				<?php endif; ?>	
			</span>
		<?php } ?>	
		</div>
		<!-- .site-branding -->
		
	</div>

</header>
<?php }