<article class="post post-standard post-video post-media">
    <!-- displaying post title -->
    <h2 class="post-title"> <a href=" <?php the_permalink() ?> "><?php the_title(); ?></a> </h2>
    <!-- displaying post meta info -->
    <p class="post-meta">
      <!--- Post date creation -->
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
    <!-- displaying post content since no excerpt -->
    <div class="media-excerpt video-excerpt"><?php the_content(); ?></div>
</article>
