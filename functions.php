<?php

/* Scripts and Stylesheet */
function march_resources(){
  // Main Stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());
  // Main Script
  wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'march_resources');


/* Extra Theme Setup */
function march_setup(){
  //   Add Menus support
  register_nav_menus (
    array('header-nav' => __('Header Navigation'),)
  );
  //    Add featured image support
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','march_setup');

/* Add Widget support   */
function registerSidebarArray($name, $id){
    register_sidebar( array(
        'name' => $name,
        'id' => $id,
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}

function WidgetInit(){
    registerSidebarArray('Sidebar Index', 'sidebarindex');
}
add_action('widgets_init', 'WidgetInit');
?>
