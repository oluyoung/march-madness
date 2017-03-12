<?php get_header(); ?>

<section class="page-content index-page">
  <section class="content clearfix">
      <!-- gives a title to an archive -->
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
    <?php
    /* WP Loop */
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
