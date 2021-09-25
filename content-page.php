<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WooFoosComm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<header>

		<?php if( ! is_404() ) :

			the_title( '<h1 class="hlarge">', '</h1>' );

		else : ?>

			 <h1 class="hlarge">404</h1>

			 <p><?php esc_html_e( 'Sorry, but there aint\'t anything here. Please try searching by keyword?.', 'WooFoosComm' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>

	</header>



	<?php the_content(); ?>



</article>
