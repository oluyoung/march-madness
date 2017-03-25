 <p class="post-meta">
  <!--- Post date creation -->
  <span itemprop="dateCreated" >
    <span class="meta-icon md" id="meta-date-icon">
      <?php echo get_svg(array('icon'=>'calendar')); ?>
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
  <?php
    $categories = get_the_category();
    $separator = ", ";
    $out = '';
    if($categories){
      foreach ($categories as $category) {
        $out .= '<a itemprop="articleSection" class="post-category" href="'. get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $separator;
      }
    }
    echo trim($out, $separator);
  ?>
</p>
