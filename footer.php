<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bookworm
 * @since 1.0
 * @version 1.2
 */

?>

<footer id="footer" role="contentinfo" class="ripped_footer">
	<div id="footer-widgets">
    <section class="widget_text footer-section">
      <?php if ( is_active_sidebar( 'footer1' ) ) : ?>				
          <?php dynamic_sidebar( 'footer1' ); ?>
      <?php endif; ?>			
      <?php if ( ! dynamic_sidebar( 'footer1' ) ) : ?>	
        <h2 class="footer-title">Left Column</h2>
        <div class="textwidget custom-html-widget">
          <ul>
            <li>Widget: footer1</li>
          </ul>
        </div>
      <?php endif; ?>
    </section>
    <section class="widget_text footer-section">
      <?php if ( is_active_sidebar( 'footer2' ) ) : ?>				
          <?php dynamic_sidebar( 'footer2' ); ?>
      <?php endif; ?>			
      <?php if ( ! dynamic_sidebar( 'footer2' ) ) : ?>	
        <h2 class="footer-title">Center Column</h2>
        <div class="textwidget custom-html-widget">
          <ul>
            <li>Widget: footer2</li>
          </ul>
        </div>					
      <?php endif; ?>
    </section>
		<section class="widget_text footer-section">
      <?php if ( is_active_sidebar( 'footer3' ) ) : ?>				
          <?php dynamic_sidebar( 'footer3' ); ?>
      <?php endif; ?>			
      <?php if ( ! dynamic_sidebar( 'footer3' ) ) : ?>	
        <h2 class="footer-title">Right Column</h2>
        <div class="textwidget custom-html-widget">
          <ul>
            <li>Widget: footer3</li>
          </ul>
        </div>				
      <?php endif; ?>
    </section>	
	</div>
	<div id="footer-colo">
    <section>
      <?php
				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'bookworm' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;?>
    </section>
    <section>
      <?php if ( is_active_sidebar( 'copyright' ) ) : ?>				
          <?php dynamic_sidebar( 'copyright' ); ?>
      <?php endif; ?>			
      <?php if ( ! dynamic_sidebar( 'copyright' ) ) : ?>	
          <p>&#169; Copyright Notice Here: copyright widget</p>				
      <?php endif; ?>
      
      <?php
        if ( function_exists( 'the_privacy_policy_link' ) ) {
          the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
        }
      ?>
      <p>
        <a href="<?php echo esc_url( __( 'https://kennethmdouglass.com/blog/', 'bookworm' ) ); ?>" class="imprint" target="_blank">
          <?php printf( 'We tell stories because that is life.' ); ?>
        </a>
      </p>
    </section>
	</div>
</footer>

</body>
</html>

