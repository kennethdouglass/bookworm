
<?php get_header(); 
/**
 * The template for displaying archive pages
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
					<?php
					the_archive_title( '', '' );
					?>
				</span>		
			</h2>
		
			<div id="content-post">		
			
				<?php
				if (is_author() or is_category()) {
					echo '<div class="archive-desc">'; 
						$description = get_the_archive_description();
						if ( $description ) {
							echo  $description;
						} else {
							echo 'No description available.';
						}
					echo '</div>';
				} 
				?>
							
				<?php while ( have_posts() ) : the_post();
				
					echo '<h3><a href="';
					the_permalink(); 
					echo '">';
					the_title();
					echo '</a></h3>';
					
					echo '<div class="archive-post"><p class="date-meta">';
					the_date( '', 'Posted on <b>', '</b>' );
					echo '&#160;&#160; | &#160;&#160;By <i>';
					the_author_posts_link();
					echo '</i></p>';

					the_content(); 
					
					echo '</div>';

				endwhile;?>  
					
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


