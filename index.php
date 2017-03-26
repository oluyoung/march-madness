<?php get_header(); ?>

<section class="page-content index-page">
  <section class="content clearfix">
    <?php
    if(have_posts()):
      while(have_posts()):
        the_post();
        get_template_part('templates/content', get_post_format() );
      endwhile;
    else:
      printf( __( '%s', 'march' ), sprintf( '<h2 class="no-content">%s</h2>', 'No Content Found' ));
    endif;
    /* Pagination for archives */
    the_posts_pagination( array(
      'mid_size' => 2,
      'prev_text' => __( '<span class="multi-posts-nav">Previous</span>', 'march' ),
      'next_text' => __( '<span class="multi-posts-nav">Next</span>', 'march' ),
    ) );
    ?>
    </section>
  <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
