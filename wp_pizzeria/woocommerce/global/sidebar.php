<?php
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( is_active_sidebar( 'shop' ) ) : ?>
		<div id="secondary" class="widget-area" >
			<?php dynamic_sidebar( 'shop' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
