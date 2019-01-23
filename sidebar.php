<?php
/**
 * The sidebar containing the main widget area - deprecated in this theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bookworm
 * @since 1.0
 * @version 1.0
 */
?>

<div id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'bookworm' ); ?>">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
 		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>	
			<p>The dynamic sidebar sidebar-1</p>				
	<?php endif; ?>
</div><!-- #secondary -->
