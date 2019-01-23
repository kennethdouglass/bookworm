
<?php get_header(); 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

			<?php while ( have_posts() ) : the_post();

				echo '<h2 class="post-title"><span>';
				single_post_title(); 

				echo '<span class="date-meta">';
				the_date( '', 'Posted on <b>', '</b>' ); 
				echo '&#160; | &#160;By <i>';
				the_author_posts_link();
				echo '</i></span>';

				echo '</span></h2>';
		
				echo '<div id="content-post">';		
	
					the_content(); 
					
					
					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				endwhile;?>     
					
			</div>
		
			<aside id="sidebar">
			
				<?php 
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					
					echo '<p class="post-nav">';
					
					if (!empty( $prev_post )) {
						echo '<span><i class="fas fa-arrow-left"></i> ';
						previous_post('%', '', 'yes', 'yes'); 
						echo '</span>';
					} 
					
					if (!empty( $next_post )) {
						echo '<span class="next-post">';
						next_post('%', '', 'yes', 'yes');
						echo ' <i class="fas fa-arrow-right"></i></span>';
					} 
					
					echo '</p>';
					
				?>
			
				<?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>				
					<?php dynamic_sidebar( 'post-sidebar' ); ?>
				<?php elseif ( is_active_sidebar( 'page-sidebar' ) ) : ?>	
					<?php dynamic_sidebar( 'page-sidebar' ); ?>	
				<?php else: ?>
					<p>(You can set up a unique sidebar for all posts, otherwise it will use the Page Sidebar)</p>
				<?php endif; ?>		
			</aside>
		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
</article>

<?php get_footer(); ?>


