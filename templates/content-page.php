<article class="page post">
  <!-- displays the post's thumbnail -->
  <?php the_post_thumbnail('banner-img'); ?>

  <h2 class="post-title"><?php the_title(); ?></h2>
  <main class=post-content>
    <?php the_content(); ?>
  </main>
</article>
