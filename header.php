<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package WooFoosComm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<a class="skip_to_content" href="#main">Skip to Content</a>

	<?php wp_body_open(); ?>

	<?php do_action( 'woofooscomm_before_site' ); ?>

	<header id="masthead" class="top">



		<button class="top_menu__toggle" id="topMenuToggle" type="button" aria-controls="sideMenu">

			<span class="">Menu</span>

		</button>



		<div class="top_logo">

			<?php // Site title or logo.
			twentytwenty_site_logo();

			// Site description.
			twentytwenty_site_description(); ?>

		</div><!-- .top_logo -->



		<?php get_search_form(); ?>



		<div class="top_features">

			<div class="top_cart">

				<?php echo '<strong>' . esc_html__( 'Total:', 'WooFoosComm' ) . '</strong> ' . WC()->cart->get_cart_subtotal(); ?>

				<?php
    			echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button">' . esc_html__( 'Cart', 'WooFoosComm' ) . '</a>';
    			?>

			</div>

			<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php echo ( ! is_user_logged_in() ? 'Sign In' : '👋 Hi ' . get_user_meta( get_current_user_id(), 'first_name', true ) ); ?></a>

		</div>



		<nav class="top_menu" id="sideMenu" aria-label="Navigation">

			<?php $defaults = array(
				'theme_location'	=> '',
				'menu'				=> 'Top Menu',
				'container'			=> '',
				'container_class'	=> false,
				'container_id'		=> '',
				'menu_class'		=> 'top_nav__main',
				'menu_id'			=> '',
				'echo'				=> true,
				'fallback_cb'		=> 'wp_page_menu',
				'before'			=> '',
				'after'				=> '',
				'link_before'		=> '',
				'link_after'		=> '',
				'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
			);

			wp_nav_menu( $defaults ); ?>

		</nav>



	</header><!-- .top -->



<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
