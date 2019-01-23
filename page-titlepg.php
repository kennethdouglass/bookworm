

<?php get_header(); 
/**
 * Template Name: CustomTitlePage 
 *
 * This is the template that displays the Custom Title Page.
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
	
	<section id="top-banner"></section>
	
	<section id="content">

		<div id="content-wrap">

      <div id="content-post" class="content-titlepage">	
	
        <?php if ( has_post_thumbnail() ) :
          $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bookworm-featured-image' );
        ?>
        
          <figure><img src="<?php echo esc_url( $thumbnail[0] ); ?>);" /></figure>

        <?php endif; ?>  


        <h2><?php echo get_bloginfo( 'name' ); ?></h2>
          
        <?php if ( is_active_sidebar( 'content-titlepg' ) ) : ?>				
						<?php dynamic_sidebar( 'content-titlepg' ); ?>
				<?php endif; ?>	
				<?php if ( ! is_active_sidebar( 'content-titlepg' ) ) : ?>	
          <h3>Title Page Content Widget</h3> 		
          <p>Use the widget for the content here.</p>		
        <?php endif; ?>	

					
			</div>
		
			<aside id="sidebar">
        <?php if ( is_active_sidebar( 'titlepg-sidebar' ) ) : ?>				
					<?php dynamic_sidebar( 'titlepg-sidebar' ); ?>
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



