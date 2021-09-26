<?php
/**
 * The template used for displaying search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WooFoosComm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>



	<?php
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
	?>



	<main id="main" class="site_main content__site_width">



		<h1>
			<?php printf(
				/* translators: %s: search term. */
				esc_html__( 'Search results for ... \'%s\'', 'WooFoosComm' ),
				'<span class="search-term"><em>' . esc_html( get_search_query() ) . '</em></span>'
			); ?>
		</h1>

		<p class="search-result-count">
			<?php
			printf(
				esc_html(
					/* translators: %d: the number of search results. */
					_n(
						'We found %d result for your search.',
						'We found %d results for your search.',
						(int) $wp_query->found_posts,
						'WooFoosComm'
					)
				),
				(int) $wp_query->found_posts
			); ?>
		</p><!-- .search-result-count -->



		<?php
		// Setup global variables
		global $wp_query; ?>

		<?php if( have_posts() ) : ?>

			<div class="search_list__container">

				<?php while( have_posts() ) : the_post(); ?>

					<?php // Let's template this output
					include( locate_template( 'content-post.php', false, false ) ); ?>

				<?php endwhile; ?>

			</div>

		<?php else : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'WooFoosComm' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>



		<div class="pagination">

			<?php numeric_pagination( $wp_query->max_num_pages ); ?>

		</div><!-- .pagination -->



	</main><!-- .site_main -->



	<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
	?>



<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
