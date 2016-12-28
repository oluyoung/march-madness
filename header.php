<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name=viewport content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php bloginfo('title'); wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section id=page>
<header id=site-header>
  <div class=hd-top>
    <div class="hd-search">
      <?php get_search_form( ); ?>
    </div>
    <h1 class=hd-title>
      <a href="<?php echo home_url(); ?>"><?php bloginfo('name');?></a>
    </h1>
  </div>
  <!-- site nav -->
  <nav class="site-nav clearfix">
    <?php
    $args = array('theme_location'=>'header-nav');
    wp_nav_menu( $args );
    ?>
  </nav>

</header>
