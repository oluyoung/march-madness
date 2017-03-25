<?php get_header(); ?>

<section class="page-content index-page">
    <!-- gets the title to an archive -->
    <h2 class="archive-title">You searched for: <span style="color:red"><?php the_search_query(); ?></span></h2>
  <section class="content clearfix">
    <?php
    /* WP Loop */
    if(have_posts()):
      while(have_posts()):
        the_post();
        get_template_part('templates/content', get_post_format() );
      endwhile;
    else:
      echo "<h4 class='no-content'>No content found</h4>";
    endif;
    /* Pagination for archives */
    get_template_part('templates/archive-pagination.php');
    ?>
    </section>
  <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
