<?php get_header(); ?>

<section class="page-content index-page">
    <!-- gets the title to an archive -->
    <h2 class="archive-title">
    <?php
      /* Gets the Archive Type and Title */
      if ( is_category() ) echo single_cat_title();
      elseif ( is_tag() ) echo single_tag_title();
      elseif ( is_author() ) echo get_the_author().'\'s Archive' ;
      elseif ( is_day() ) echo get_the_date().'\'s Archive' ;
      elseif ( is_month() ) echo get_the_date('F Y').'\'s Archive';
      elseif ( is_year() ) echo get_the_date('Y').'\'s Archive';
      else echo 'Archive';
    ?></h2>
  <section class="content march-index-layout clearfix">
    <?php
    /* WP Loop */
    if(have_posts()):
      while(have_posts()):
        the_post();
        get_template_part('templates/content', get_post_format() );
      endwhile;
    else:
      printf( __( '%s', 'march' ), sprintf( '<h2 class="no-content">%s</h2>', 'No Content Found' ));
    endif;
    ?>
    </section>

    <?php
    /* Pagination for archives */
    the_posts_pagination( array(
      'mid_size' => 2,
      'prev_text' => __( '<span class="multi-posts-nav">Previous</span>', 'march' ),
      'next_text' => __( '<span class="multi-posts-nav">Next</span>', 'march' ),
    ) );

    /* Sidebar */
    get_sidebar(); ?>
</section>

<?php get_footer(); ?>
