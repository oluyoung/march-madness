<?php get_header(); ?>

<section class="page-content index-page">

  <section class="content clearfix">
    <?php
    if(have_posts()):
      while(have_posts()):
        the_post();
        get_template_part('content', get_post_format() );
      endwhile;
    else:
      echo "<h4>No content found</h4>";
    endif;
    ?>
  <section class="pagination">
    <?php
    the_posts_pagination( array(
        'mid_size' => 2,
        'prev_text' => __( '<span class="multi-posts-nav">Previous</span>', 'textdomain' ),
        'next_text' => __( '<span class="multi-posts-nav">Next</span>', 'textdomain' ),
    ) );
    ?>
  </section>
  </section>

  <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
