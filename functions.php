<?php
/**
 * Theme functions and definitions
 *
 * @since 1.0.0
 */



add_action( 'after_setup_theme', 'woofoosgenerate__theme_setup', 20 );
function woofoosgenerate__theme_setup() {

	/* Remove GeneratePress default Primary menu to initialize our own */
	unregister_nav_menu( 'primary' );
	register_nav_menus( array(
		'primary'    => __( 'Primary Menu', 'woofoosgenerate' )
	) );

	/* Include external functions stolen from other sites ... no joke. */
	require get_theme_file_path() . '/src/woofoosgenerate-functions.php';

}



add_action( 'wp', 'woofoosgenerate__woocommerce_setup', 20 );
function woofoosgenerate__woocommerce_setup() {

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	if( is_product() ) {
		remove_action( 'generate_before_content', 'generate_featured_page_header_inside_single' );
	}

}
