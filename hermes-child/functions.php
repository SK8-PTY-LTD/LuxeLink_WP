<?php 
add_action( 'wp_enqueue_scripts', 'hermes_child_scripts_styles', 15 );
function hermes_child_scripts_styles(){
	global $hermes_opt;
	if($hermes_opt['enable_less']){
		$hermes = array(
			// less variables
		);
		if( function_exists('compileLess') ){
			compileLess('child-theme.less', 'child-theme.css', $hermes);
		}
	}
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/css/child-theme.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
}

if( ! function_exists('luxelink_shop_display_post_meta') ) : 
	function luxelink_shop_display_post_meta() {

		global $product;
		
		// replace the custom field name with your own
		$condition = $product->get_attribute( 'CONDITION' );
		

	  // Add these fields to the shop loop if set
		if ( ! empty( $condition ) ) {
			echo '<div class="product-meta" align="left"><h3 style="color:#e16912">CONDITION: ' . ucwords( $condition ) .  '</h3></div>';
		}

	}
	add_action( 'woocommerce_after_shop_loop_item', 'luxelink_shop_display_post_meta', 0 );
endif;