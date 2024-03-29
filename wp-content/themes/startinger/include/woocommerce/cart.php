<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
* WooCommerce Cart
*/

	function startinger_wc_cart_count() {
		if( !get_theme_mod( 'startinger_header_cart' ) ) {
		// Returns an empty string, if the cart item is not found

				global $woocommerce;
				$total = $woocommerce->cart->get_cart_total();
				$count = WC()->cart->cart_contents_count;	
				?><a title="<?php __('View your cart','startinger'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php
				
					if ( $count == 0 ) {
						?>
						<span class="cart-contents-count"> </span>
						<span class="my-cart">
							<div class="s-cart_num">0</div>
						</span>
						<?php            
					}		
					if ( $count == 1 ) {
						?>
						<span class="my-cart"><div class="s-cart_num"><?php echo esc_html( $count ); ?></div></span>
						<?php
					}
					if ( $count > 1 ) {
						?>
						<span class="my-cart"><div class="s-cart_num"><?php echo esc_html( $count ); ?></div></span>
						<?php
					}		
				
				?></a>
				<?php
		}

	}
	add_action( 'startinger_header_woo_cart', 'startinger_wc_cart_count' );

	/**
	 * Ensure cart contents update when products are added to the cart via AJAX
	 */
	 
	function startinger_header_add_to_cart_fragment( $fragments ) {

		ob_start();
			global $woocommerce;	
			$total = $woocommerce->cart->get_cart_total();
			$count = WC()->cart->cart_contents_count;
			?><a title="<?php __('View your cart','startinger'); ?>" class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php

				if ( $count == 0 ) {
					?>
					<span class="cart-contents-count"></span>
					<span class="my-cart">
						<div class="s-cart_num">0</div>
					</span>
					<?php            
				}
				
				if ( $count == 1 ) {
					?>
					<span class="my-cart"><div class="s-cart_num"><?php echo esc_html( $count ); ?></div></span>
					<?php            
				}
				if ( $count > 1 ) {
					?>
					<span class="my-cart"><div class="s-cart_num"><?php echo esc_html( $count ); ?></div></span>
					<?php
				}			
			?></a>
			<?php
	 
		$fragments['a.cart-contents'] = ob_get_clean();
		 
		return $fragments;
		
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'startinger_header_add_to_cart_fragment' );
