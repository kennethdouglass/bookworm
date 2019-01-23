
<?php get_header(); 
/**
 * The template for displaying blog post search results page
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
					<?php if ( have_posts() ) : ?>
					<?php printf( __( 'Search Results for: %s', 'bookworm' ), ' <b>' . get_search_query() . '</b>' ); ?>
					<?php else : ?>
					<?php _e( 'No Results Found', 'bookworm' ); ?>
					<?php endif; ?>
				</span>		
			</h2>
		
			<div id="content-post">		

				<?php if ( have_posts() ) : ?>								
					 <?php while ( have_posts() ) : the_post(); ?>
					 
					 	<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					
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
					
				<?php else : ?>
				
					<p><?php _e( 'Sorry, but nothing matched your search term(s). Please try again with a different query.', 'bookworm' ); ?></p>
			<?php get_search_form(); ?>
				

				<?php endif; ?> 
					
			</div>
		
			<aside id="sidebar">
				<?php if ( is_active_sidebar( 'sidebar-search' ) ) : ?>				
					<?php dynamic_sidebar( 'sidebar-search' ); ?>
				<?php elseif ( is_active_sidebar( 'page-sidebar' ) ) : ?>	
					<?php dynamic_sidebar( 'page-sidebar' ); ?>	
				<?php else: ?>
					<p>(You can add a unique Title Page Sidebar, otherwise it will use the Page Sidebar)</p>
				<?php endif; ?>		
			</aside>

		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
</article>

<?php get_footer(); ?>


