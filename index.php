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
      echo "<h4>No content found</h4>";
    endif;
    /* Pagination for archives */
    get_template_part('templates/archive-pagination.php');
    ?>
    </section>
  <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
