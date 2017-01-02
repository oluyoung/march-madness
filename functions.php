<?php

/* Scripts and Stylesheet */
function march_resources(){
  // main stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());
  // style script
  wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'march_resources');


/* Extra Theme Setup */
function march_setup(){
  /*    Add Menus support    */
  register_nav_menus (
    array('header-nav' => __('Header Navigation'),)
  );
  /*    Add featured image support    */
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','march_setup');

?>
