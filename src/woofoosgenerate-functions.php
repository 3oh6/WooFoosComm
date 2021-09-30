<?php 



/*
 *	Rebuild our own Footer from generatepress/inc/footer.php
 */
remove_action( 'generate_credits', 'generate_add_footer_info' );
add_action( 'generate_credits', 'reskilled_add_footer_info' );

	/**
	 * Add the copyright to the footer
	 *
	 * @since 0.1
	 */
	function reskilled_add_footer_info() {
		$copyright = sprintf(
			'<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s"%6$s target="_blank">%5$s</a>',
			date( 'Y' ), // phpcs:ignore
			get_bloginfo( 'name' ),
			esc_url( 'https://jodybailey.ca' ),
			_x( 'Built by', 'GeneratePress', 'reskilled' ),
			__( 'Jody Bailey', 'reskilled' ),
			'microdata' === generate_get_schema_type() ? ' itemprop="url"' : ''
		);

		echo apply_filters( 'generate_copyright', $copyright ); // phpcs:ignore
	}
