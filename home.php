
<?php get_header(); 
/**
 * The template for displaying blog post home page
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
  
	<section id="top-banner">
		
	</section>
	
	<section id="content">
	
		<div id="content-wrap">

			<h2 class="post-title">
				<span>				
					<?php if ( isset($_post->post_title) ) :
					echo 'Blog Post Wasn\'t Found';
					else: ?>
					<?php single_post_title(); ?></span>
					<?php endif; ?>
				</span>		
			</h2>
		
			<div id="content-post">		
			
				<?php
				if (is_author() or is_category()) {
					echo '<div class="archive-desc">'; 
					the_archive_description( '', '' );
					echo '</div>';
				}
				?>
				
				<?php if ( have_posts() ) : ?>								
					 <?php while ( have_posts() ) : the_post(); ?>
					 
					 	<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
					
						<div class="archive-post"><p class="date-meta">
						<?php the_date( '', 'Posted on <b>', '</b>' ); ?>
						&#160;&#160; | &#160;&#160;Time posted: <b> 
						<?php the_time(); ?> 
						</b>&#160;&#160; | &#160;&#160;By <i>
						<?php the_author_posts_link(); ?>
						</i></p>

						<?php the_content(); ?> 
					
						</div>

					<?php endwhile; ?>  
					
				<?php else : 
				
					echo '<div class="sys-error">';
					echo 'Oops! It seems there are currently no blog posts.';
					echo '</div>';

				endif;?> 
					
			</div>
		
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside>
		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
</article>

<?php get_footer(); ?>


