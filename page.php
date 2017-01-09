<?php get_header(); ?>

<section id=single-page class=single-post-page>
  <?php get_sidebar(); ?>
  <section id=content>
    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'content', 'page' );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>
  </section>
</section>

<?php get_footer(); ?>
