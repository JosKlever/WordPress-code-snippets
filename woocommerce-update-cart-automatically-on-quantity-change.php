/**
 * Snippet Name:	WooCommerce Automatically Update Cart On Quantity Change
 * Snippet Author:	ecommercehints.com
 8 Source: https://unlimitedwp.com/ecommercehints/woocommerce-automatically-update-cart-on-quantity-change/
 */

// First, hide the Update Cart button
add_action( 'wp_head', 'ecommercehints_hide_update_cart_button' );
function ecommercehints_hide_update_cart_button() { ?>
	<style>
		button[name="update_cart"], input[name="update_cart"] {
			display: none;
		}
</style>
<?php }

// Second, add the jQuery to update the cart automaitcally on quantity change
add_action( 'wp_footer', 'ecommercehints_update_cart_on_quantity_change');
function ecommercehints_update_cart_on_quantity_change() { ?>
	<script>
	jQuery( function( $ ) {
		let timeout;
		$('.woocommerce').on('change', 'input.qty', function(){
			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout(function() {
				$("[name='update_cart']").trigger("click");
			}, 500 ); // 500 being MS (half a second)
		});
	} );
	</script>
<?php }
