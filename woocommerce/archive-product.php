<?php
/**
 * Product Archive template file
 *
 * It's for archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();



/* Product Category specific */
$cat = get_queried_object();

if( ! empty( $cat->parent ) ) {
	$parent_cat_id = $cat->parent;
		$parent_cat = get_term_by( 'id', $parent_cat_id, 'product_cat' );
}
?>



<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>



<main id="main" class="site_main content__site_width" role="main">



	<?php if( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

		<h1><?php woocommerce_page_title(); ?></h1>

	<?php endif; ?>



	<div class="product_list__main">

		<?php if ( woocommerce_product_loop() ) :

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );

			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );

		else :

			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );

		endif; ?>

	</div>



</main><!-- .site_main -->



<?php
/**
 * woocommerce_after_main_content hook.
 *
 */
do_action( 'woocommerce_after_main_content' );



get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
