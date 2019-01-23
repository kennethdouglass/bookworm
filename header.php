<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="target-densitydpi=device-dpi,width=device-width,initial-scale=1,minimum-scale=1.0, maximum-scale=1.0"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="header" role="banner"> 
  <hgroup>
    <div id="logospacer">
      <?php 
        if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
        }
      ?>
    </div>
    <div id="hgroup">
      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
      <?php $description = get_bloginfo( 'description', 'display' ); 
        if ( $description || 	is_customize_preview() ) : ?>
          <div id="desc"><?php echo $description; ?></div>
      <?php endif; ?>
    </div>
    <nav id="main-menu" class="menu-main-container" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </nav>
    <a href="#" class="hbx" id="hamicon"><b></b><i></i><em></em></a>
  </hgroup>
</header>

<div id="content-container" class="content-container">




