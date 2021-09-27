<?php
/**
 * Theme functions and definitions
 *
 * @since 1.0.0
 */



function woofoosgenerate__theme_setup() {

    /* Remove GeneratePress default menu */
    unregister_nav_menu( 'primary' );

    /* Register our own menus */
    register_nav_menus( array(
        'top_menu'    => __( 'Top Menu', 'WooFoosComm' ),
    ) );

    /* Include external functions stolen from other sites ... no joke. */
    require get_theme_file_path() . '/inc/woofoosgenerate-functions.php';

}

add_action( 'after_setup_theme', 'woofoosgenerate__theme_setup', 20 );
