<?php get_header(); ?>

<section id="single-page" class="single-post-page page-content single-page">
  <?php get_sidebar(); ?>
  <section id=content>
    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'templates/content', 'page' );
    endwhile; // End of the loop.
    ?>
    <!-- Comments -->
    <section class=post-comments>
      <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>
    </section>
  </section>
</section>

<?php get_footer(); ?>
