<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WooFoosComm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$woofooscomm_unique_id = wp_unique_id( 'search-form-' );
$woofooscomm_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<form role="search" <?php echo $woofooscomm_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">



	<input type="text" id="<?php echo esc_attr( $woofooscomm_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" required />

	<label for="<?php echo esc_attr( $woofooscomm_unique_id ); ?>"><?php _e( 'looking for&hellip;', 'twentytwentyone' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>

	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwentyone' ); ?>" />



</form>
