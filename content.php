<section class="post post-standard <?php if(has_post_thumbnail() ){ ?>has-thumbnail<?php } else { ?>no-thumbnail<?php } ?>">
  <!-- displays the post's thumbnail -->
  <div class="post-thumbnail">
    <a href=" <?php the_permalink() ?> "><?php the_post_thumbnail('small-thumb'); ?></a>
  </div>
  <div class=excerpt-info>
    <!-- displays and links to the post title -->
    <h2 class="post-title"><a href=" <?php the_permalink() ?> "><?php the_title(); ?></a></h2>
      <!-- displaying post meta info -->
      <p class="post-meta"><?php the_time('F jS, Y g:i a'); ?> |
      <!-- returns author and links -->
      by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |
      <!-- returns category(ies) of posts -->
      posted in <?php
        $categories = get_the_category();
        $separator = ", ";
        $out = '';

        if($categories){
          foreach ($categories as $category) {
            $out .= '<a href="'. get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $separator;
          }
        }
        echo trim($out, $separator);
      ?>
      </p>

    <div class=excerpt>
      <p>
      <?php echo get_the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
      </p>
    </div>
  </div>
</section>
