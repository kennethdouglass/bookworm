
<?php get_header(); 
/**
 * The main template file
 *
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

      <h2 class="post-title"><span>
      
        <?php if ( !isset($_post->post_title) ) :
          echo 'Page Wasn\'t Found';
        else: ?>
          <?php single_post_title(); ?></span>
        <?php endif; ?>
        
      </h2>
		
			<div id="content-post">		
			
				<?php if ( have_posts() ) :
				
					while ( have_posts() ) : the_post();

						the_content(); 

					endwhile;
					
				else :

					echo '<div class="sys-error">';
					echo 'Oops! It seems either a template is missing or that page is not on this site. Please contact us if the problem persists. Thanks!';
					echo '</div>';

				endif;?>      
					
			</div> <!-- #content-post -->
		
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside>
		
		</div> <!-- #content-wrap -->

	</section><!-- #content -->
	
</article>

<?php get_footer(); ?>


