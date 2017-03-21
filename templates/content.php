<section class="post post-standard <?php if(has_post_thumbnail() ){ ?>has-thumbnail<?php } else { ?>no-thumbnail<?php } ?>" itemscope itemtype="https://schema.org/Article">

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
    </h2>
    <!-- displays the post's thumbnail for tablet devices -->
    <div class="post-thumbnail-md">
      <a itemprop="thumbnailUrl" href="<?php the_permalink() ?>">
        <span itemprop="image"><?php the_post_thumbnail('small-thumb'); ?></span>
      </a>
    </div>
    <!-- displaying post meta info -->
    <p class="post-meta">
      <!-- Post date creation -->
      <span itemprop="dateCreated" >
        <span class="meta-icon md" id="meta-date-icon"><?php echo get_svg(array('icon'=>'calendar')); ?>
        </span>
        <span class="date-created"><?php the_time('F jS, Y'); ?></span>
        <span class="date-created-md"><?php the_time("d-m-y"); ?></span>
      </span>
      <span class="extra-text">by</span>
      <!-- returns author and links -->
      <a itemprop="author" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
        <span class="meta-icon md" id="meta-author-icon"><?php echo get_svg(array('icon'=>'user')); ?>
        </span>
        <?php the_author(); ?>
      </a>
      <!-- Comments Number -->
      <span class="meta-info comments_num md">
        <span class="meta-icon md" id=meta-comments-icon><?php echo get_svg(array('icon'=>'bubbles')); ?>
        </span>
        <span><?php echo get_comments_number(); ?></span>
      </span>
      <span class="extra-text"> posted in </span>
      <!-- returns category(ies) of posts -->
      <?php get_template_part('templates/list_post_categories'); ?>
    </p>

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
</section>
