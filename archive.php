<?php
/**
 * Archive template file
 *
 * It's for archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>



<?php $cat = array_pop( get_the_category() ); ?>



<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
?>



<main id="main" class="site_main content__site_width content__with_sidebar" role="main">



	<div class="with_sidebar__main">

		<h1><?php echo $cat->name; ?></h1>

		<p><?php echo $cat->description; ?></p>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content/content', 'archive' );

		endwhile;
		?>

	</div>



	<?php /**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'woocommerce_sidebar' );
	?>



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
