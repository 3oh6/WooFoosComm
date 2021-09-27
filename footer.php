<?php
/**
 * Footer template file
 *
 * It's for site footer AKA "we started at the bottom, now we still here".
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>



<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>



<footer class="bottom">

	<nav class="top_menu" id="bottomMenu" aria-label="Bottom Navigation">

		<?php $defaults = array(
			'theme_location'	=> '',
			'menu'				=> 'Bottom Menu',
			'container'			=> '',
			'container_class'	=> false,
			'container_id'		=> '',
			'menu_class'		=> 'bottom__nav',
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

	</nav><!-- .bottom_nav -->

</footer>



	<?php wp_footer(); ?>

</body>
</html>
