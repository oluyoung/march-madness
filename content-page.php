<article class="page post <?php if( has_post_thumbnail() ){ ?> has-thumbnail <?php } ?>">
  <!-- displays the post's thumbnail -->
  <?php the_post_thumbnail('banner-img'); ?>

  <!-- displays and links to the post title -->
  <h2 class="post-title"><?php the_title(); ?></h2>
  <main class=post-content>
    <?php the_content(); ?>
  </main>
</article>
