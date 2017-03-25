<article <?php post_class(); ?> id="post-<?php the_ID(); ?> itemscope itemtype="https://schema.org/Article">

  <!-- displays the post's thumbnail/featured-image -->
  <div class="post-thumbnail">
      <a itemprop="thumbnailUrl" href="<?php the_permalink() ?>">
      <span itemprop="image"><?php the_post_thumbnail('small-thumb'); ?></span>
    </a>
  </div>

  <!-- Displays Post's excerpt -->
  <div class="excerpt-info">
    <!-- displays and links to the post title -->
    <h2 itemprop="headline" class="post-title">
      <a href=" <?php the_permalink() ?> "><?php the_title(); ?></a>
      <span class="meta-icon" id="meta-sticky-icon">
        <?php echo get_svg(array('icon'=>'pushpin')); ?>
      </span>
    </h2>
    <!-- displays the post's thumbnail for tablet devices -->
    <div class="post-thumbnail-md">
      <a itemprop="thumbnailUrl" href="<?php the_permalink() ?>">
        <span itemprop="image"><?php the_post_thumbnail('small-thumb'); ?></span>
      </a>
    </div>
    <!-- displaying post meta info -->
   <?php get_template_part('templates/post_meta_template'); ?>

   <!-- displaying the ecverpy -->
    <div class="excerpt">
      <p itemprop="articleBody">
      <?php echo get_the_excerpt(); ?>
      <a itemprop="url" href="<?php the_permalink(); ?>">Read more &raquo;</a>
      <span itemprop="dateModified" class="updated-time">
        <?php
        if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) {
          echo 'Last updated: '.get_the_modified_time('F jS, Y g:i a');
        }
        ?>
        </span>
      </p>
    </div>
  </div>
</article>
