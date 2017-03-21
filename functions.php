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
    array('header-nav' => __('Header Navigation'),)
  );
  //    Add Featured Image support
  add_theme_support('post-thumbnails');
  //    Add Post Format support
  add_theme_support( 'post-formats', array(
    'image',
    'video',
  ));
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

/* custom excerpt length */
function customExcerptLength(){
  return 25;
}

/** Internal universal files fequired **/
/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/resources/includes/icon-functions.php' );

/* Editing the WP Core Comment Template */
wp_list_comments( array(
 'callback' => 'march_list_comments',
));
/*
  Original Template from http://bbird.me/editing-wp_list_comments-output/
*/

function march_list_comments( $comment, $depth, $args ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '' ); ?>>
  <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <footer class="comment-meta">
      <div class="comment-author vcard">
        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '%s' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
      </div><!-- .comment-author -->
      <div class="comment-metadata">
          <time datetime="<?php comment_time( 'c' ); ?>">
            <?php printf( _x( '%s %1$s %s %2$s', '1: date, 2: time' ), get_svg(array('icon'=>'calendar')), get_comment_date(), get_svg(array('icon'=>'clock2')), get_comment_time() ); ?>
          </time>
        <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!-- .comment-metadata -->
      <?php if ( '0' == $comment->comment_approved ) : ?>
      <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
      <?php endif; ?>
    </footer><!-- .comment-meta -->
    <div class="comment-content">
      <?php comment_text(); ?>
    </div><!-- .comment-content -->

    <?php
    comment_reply_link( array_merge( $args, array(
      'add_below' => 'div-comment',
      'depth'     => $depth,
      'max_depth' => $args['max_depth'],
      'before'    => '<div class="reply">',
      'after'     => '</div>'
    ) ) );
    ?>
  </article><!-- .comment-body -->
<?php
} /* end march_list_comments */


/*
* GOTTA TWEAK, nearly there
* Function to keep code D.R.Y. by providing reused snippets
* $snippet: piece of code needed to be used
* $classes: classes to add to outermost element
* $id: id to add to outermost element
*/
/*
function DRYsnippets($snippet, $classes=""){
  $snippets = array(
    'post_thumbnail' => "<div class='".$classes."'>
      <a itemprop='thumbnailUrl' href='".the_permalink()."'>
      <span itemprop='image'>".the_post_thumbnail('small-thumb')."</span>
    </a>
  </div>",
  'list_post_categories' =>
  );
  echo $snippets[$snippet];
}
*/


/* end of file */
?>
