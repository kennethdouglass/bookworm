
<?php get_header(); 
/**
 * 
 * Template Name: CustomPageTOC 
 * 
 * The template for displaying the table of contents page
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

			<?php 
			$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'order'=>'ASC')); ?>

			<?php if ( $wpb_all_query->have_posts() ) : ?>

			<ol class="ordered-list">

					<!-- the loop -->
					<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<!-- end of the loop -->

			</ol>

				<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
					
			</div>
		
			<aside id="sidebar">
				<?php if ( is_active_sidebar( 'toc-sidebar' ) ) : ?>				
					<?php dynamic_sidebar( 'toc-sidebar' ); ?>
				<?php elseif ( is_active_sidebar( 'page-sidebar' ) ) : ?>	
					<?php dynamic_sidebar( 'page-sidebar' ); ?>	
				<?php else: ?>
					<p>(You can add a unique TOC Sidebar, otherwise it will use the Page Sidebar)</p>
				<?php endif; ?>	
			</aside>
		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
	
</article>

<?php get_footer(); ?>


