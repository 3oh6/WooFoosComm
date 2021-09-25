<?php
/**
 * Template Part Product Item.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WooFoosComm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$_product = wc_get_product( get_the_ID() ); ?>


<a class="" href="<?php echo get_permalink( get_the_ID() ); ?>">

	<article class="post post-<?php echo get_the_ID(); ?>" itemscope itemtype="http://schema.org/Post">

		<div class="post__thumb"></div>

		<header>

			<h2 itemprop="title"><?php echo get_the_title(); ?></h2>

		</header>

		<?php if( isset( $product ) ) { ?>

			<ul>
				<li>Price: $<?php echo round( $_product->get_price(), 2 ); ?></li>
				<li>Qty: <?php echo ( $_product->get_stock_quantity() ? $_product->get_stock_quantity() : 'Sorry OOS' ); ?></li>
				<li><small>SKU: <?php echo $_product->get_sku(); ?></small></li>
			</ul>

		<?php } else { ?>

			<?php the_excerpt(); ?>

		<?php } ?>

	</article>

</a>
