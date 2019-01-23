
<?php get_header(); 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Bookworm
 * @since 1.0
 * @version 1.0
 */
 ?>

<article class="site-content">

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bookworm-featured-image' );
	?>
	
	<section id="top-banner" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);"></section>
		
	<?php else: ?>
	
	<section id="top-banner"></section>

	<?php endif; ?>
	
	<section id="content">

		<div id="content-wrap">
	
			<h2 class="post-title"><span>
				<?php single_post_title(); ?> 
			</span></h2>
		
			<div id="content-post">		

				<?php while ( have_posts() ) : the_post();

					the_content(); 

				endwhile;?>    
					
			</div>
		
			<aside id="sidebar">
				<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>				
						<?php dynamic_sidebar( 'page-sidebar' ); ?>
				<?php endif; ?>	
				<?php if ( ! is_active_sidebar( 'page-sidebar' ) ) : ?>	
				  <p>Page Sidebar Widget. This is the site-wide default sidebar and should be set with "something".</p> 				
				<?php endif; ?>		
			</aside>
		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
	
</article>

<?php get_footer(); ?>


