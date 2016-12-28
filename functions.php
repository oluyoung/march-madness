<?php


/* Scripts and Stylesheet */
function march_resources(){
  // main stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());
  // style script
  wp_enqueue_script( 'sctipt', get_template_directory_uri().'/js/script.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'march_resources');


/* Extra Theme Setup */
function march_setup(){
  register_nav_menus(
    array('header-nav' => __('Header Navigation'),)
  );
}
add_action('after_setup_theme','march_setup');

?>
