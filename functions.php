<?php

/* Scripts and Stylesheet */
function march_resources(){
  // Main Stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());
  // Main Script
  wp_enqueue_script('script', get_template_directory_uri().'/resources/js/script.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'march_resources');


/* Extra Theme Setup */
function march_setup(){
  //   Add Menus support
  register_nav_menus (
    array('header-nav' => __('Header Navigation', 'march'),)
  );
  //    Add Featured Image support
  add_theme_support('post-thumbnails');
  //    Add Post Format support
  add_theme_support( 'post-formats', array(
    'image',
    'video',
  ));
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  if ( ! isset( $content_width ) ) {
    $content_width = 642;
  }
  add_theme_support( "custom-background" );
  add_theme_support( "custom-header" );

}
add_action('after_setup_theme','march_setup');

function wpse71451_enqueue_comment_reply() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
// Hook into comment_form_before
add_action( 'comment_form_before', 'wpse71451_enqueue_comment_reply' );

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

/* custom excerpt length */
function customExcerptLength(){
  return 25;
}

/** Internal universal files fequired
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/resources/includes/icon-functions.php' );


/* Editing the WP Core Comment Template
*
* Original Template from http://bbird.me/editing-wp_list_comments-output/
*/
function march_comments( $comment, $depth, $args ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '' ); ?>>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <header class="comment-header">
      <div class="comment-author vcard">
        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '%s', 'march' ), sprintf( '<span class="author_link">%s</span>', get_comment_author_link() ) ); ?>
      </div><!-- /comment-author -->
      <div class="comment-meta commentmetadata">
          <time datetime="<?php comment_time( 'c' ); ?>">
            <?php printf( _x( '%1$s %2$s', '1: date, 2: time', 'march' ), get_comment_date(), get_comment_time() ); ?>
          </time>
        <?php edit_comment_link( __( 'Edit', 'march' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!-- /comment-metadata -->
    </header>
    <div class="comment-content">
      <?php comment_text(); ?>
    </div><!-- /comment-content -->
      <?php if ( '0' == $comment->comment_approved ) : ?>
      <div class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'march' ); ?></div>
      <?php endif; ?><!-- /comment-moderation -->
    <p class="reply">
      <?php
        $post_id = get_the_ID();
        $comment_id = get_comment_ID();
        $max_depth = get_option('thread_comments_depth');
        $default = array(
          'add-below' => 'comment',
          'respond_id' => 'respond',
          'reply_text' => __('Reply', 'march'),
          'login_text' => __('Log in to Reply', 'march'),
          'depth' => 1,
          'before' =>'',
          'after' => '',
          'max_depth' => $max_depth
        );
        comment_reply_link($default, $comment_id, $post_id);
      ?>
    </p>
  </div><!-- .comment-body -->
<?php
} /* end march_comments */


/*
  Theme customization register
*/
function march_customize_register($wp_customize){
  /*  Theme Colors  */
  $wp_customize->add_section('theme_color_section', array(
    'title' => __('Theme Colors', 'march'),
    'priority' => 10,
  ));
    /*  Main Color */
    $wp_customize->add_control(new $customizer_class($wp_customize, 'theme_main_color',
      array(
        'label' => __('Main Color', 'march'),
        'section' => 'theme_color_section',
        'settings' => 'theme_main_color', 'Main Color')));
      /* Link Color */
      $wp_customize->add_control(new $customizer_class($wp_customize, 'theme_color_section',
      array(
        'label' => __('Link Color', 'march'),
        'section' => 'theme_color_section',
        'settings' => 'theme_color_section',
      )
    ));
}
add_action('customize_register', 'march_customize_register' );

function march_customizer_css(){ ?>
<style>

.site-nav.fixed,
.hd-search #searchsubmit,
.hd-title,
.widget-item .widget-title,
.post-title,
.widget-item #wp-calendar caption {
  background-color: <?php echo get_theme_mod('theme_main_color'); ?>;
}
.format-standard .excerpt {
  border-color: <?php echo get_theme_mod('theme_main_color'); ?>;
}
.page-numbers {
  border-color: <?php echo get_theme_mod('theme_main_color'); ?>;
}
.post-meta a,
.post-meta-xs a,
.excerpt p a,
.widget-item #wp-calendar td a {
  color: <?php echo get_theme_mod('link_color'); ?>;
}
</style>
<?php
}
add_action('wp_head', 'march_customizer_css' );
/* end of file */
?>
