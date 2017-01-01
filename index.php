<?php get_header(); ?>

<section class=index-page>

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
  </section>

  <section class="secondary-column">
    <?php get_sidebar( ); ?>
  </section>

</section>

<?php get_footer(); ?>
