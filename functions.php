<?php
/**
 * Theme functions and definitions
 *
 * @since 1.0.0
 */

add_action( 'after_setup_theme', 'woofooscomm__theme_setup' );

function woofooscomm__theme_setup() {

	register_nav_menus( array(
		'top_menu'    => __( 'Top Menu', 'WooFoosComm' ),
		'bottom_menu' => __( 'Bottom Menu', 'WooFoosComm' ),
	) );

	/* Add theme support for automatic feed links. */
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );

	/* Add theme support for the WooComm */
	add_theme_support( 'woocommerce' );

	/* Enqueue javascript */
	add_action( 'wp_enqueue_scripts', 'woofooscomm__block_editor_styles' );

	/* wp_head */
	add_action( 'wp_head', 'woofooscomm__load_head_items' );

	/* wp_footer */
	add_action( 'wp_footer', 'wp_tr_load_foot_items' );

	// add core markup to woocommerce pages
	add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
	add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

	/* Admin > Template > Template Select — Modifications */
	add_filter( 'default_page_template_title', 'woocommerce_template_select_title', 10, 2 );

}

// overwrite existing output content wrapper function
function woocommerce_output_content_wrapper() {
    return ;
}

function woocommerce_output_content_wrapper_end() {
	return '';
}



function woocommerce_template_select_title( $label, $context ) {
  return __( 'Site Width', 'WooFoosComm' );
}










if ( ! function_exists( 'woofooscomm__block_editor_styles' ) ) {

	function woofooscomm__block_editor_styles() {

		// load new jquery
		if( !is_admin() ){

			// WP Styles
			wp_dequeue_style( 'wp-block-library' );
			wp_dequeue_style( 'wp-block-library-theme' );

		}

		if ( function_exists( 'is_woocommerce' ) ) {

			/* Dequeue everything, why not? Let's get lean. */
			# Styles
			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'wc-block-style' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_style( 'select2' );
			wp_deregister_style( 'select2' );

			# Scripts
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'selectWoo' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
			wp_dequeue_script( 'select2' );

			wp_deregister_script( 'select2' );
			wp_deregister_script( 'selectWoo' );

		}

	}
}



if ( ! function_exists( 'woofooscomm__load_head_items' ) ) {

	function woofooscomm__load_head_items() { ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css'; ?>" type="text/css" media="screen, print" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,700;1,300;1,700&display=swap" />

		<link rel="profile" href="https://gmpg.org/xfn/11" />

		<!-- Pulled from modernizr to handle the no-js business above faster -->
		<script type="text/javascript">
			var d = document.documentElement; d.className = d.className.replace( /(?:^|\s)no-js(?!\S)/g , 'js' ); d = null;
		</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="240">

		<!-- HTML5 Shiv load — can't get fancy with this due to caching -->
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.js"></script>
		<![endif]-->

	<?php }

}



if ( ! function_exists( 'woofooscomm__register_nav_menu' ) ) {

	function woofooscomm__register_nav_menu() {
		register_nav_menus( array(
			'top_menu'    => __( 'Top Menu', 'text_domain' ),
			'bottom_menu' => __( 'Bottom Menu', 'text_domain' ),
		) );
	}

}
