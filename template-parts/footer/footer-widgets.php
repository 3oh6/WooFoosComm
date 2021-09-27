<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if (
    is_active_sidebar( 'footer-widget-1' ) ||
    is_active_sidebar( 'footer-widget-2' ) ||
    is_active_sidebar( 'footer-widget-3' ) ||
    is_active_sidebar( 'footer-widget-4' )
 ) : ?>

    <div class="bottom_widget__container">

        <?php
        $footer_widgets = array( '1', '2', '3', '4' );

        foreach ($footer_widgets as $key => $value) { ?>

            <?php if ( is_active_sidebar( 'footer-widget-' . $value ) ) : ?>

                <aside class="widget-area">

                    <?php dynamic_sidebar( 'footer-widget-' . $value ); ?>

                </aside><!-- .widget-area -->

            <?php endif; ?>

        <?php } ?>

    </div><!-- .bottom_widget__container -->

<?php endif; ?>
