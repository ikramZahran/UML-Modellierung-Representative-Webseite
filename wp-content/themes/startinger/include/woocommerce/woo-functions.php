<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce Functions
 */
  
/**
 * WooCommerce myaccount page
 */
function startinger_woo_account () {
	if ( class_exists( 'WooCommerce' ) and !get_theme_mod('startinger_header_my_account') ) {
					if ( is_user_logged_in() ) { ?>
						<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('My Account','startinger'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
					<?php } 
					else { ?>
						<a class="woo_log" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo esc_html('Login / Register','startinger'); ?>"><span class="woo-log-s"><span class="dashicons dashicons-admin-users"></span></span></a>
					<?php } 	
	}
}


add_action( 'startinger_header_woo_cart', 'startinger_woo_account' );  

