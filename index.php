<?php
/**
 * Blog index template file
 *
 * It's required, but I don't often use it.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<article class="post post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">

				<h1><?php get_the_title(); ?></h1>

				<?php echo the_excerpt(); ?>

				<a href="<?php the_permalink(); ?>">Link</a>

			</article>

		<?php $result_count++; endwhile; ?>

	<?php else : ?>

		<article>

			<p><?php esc_html_e( 'Sorry, but nothing here. Please try searching maybe?', 'WooFoosComm' ); ?></p>

			<?php get_search_form(); ?>

		</article>

	<?php endif; ?>

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
