<section class="post post-standard <?php if(has_post_thumbnail() ){ ?>has-thumbnail<?php } else { ?>no-thumbnail<?php } ?>" itemscope itemtype="https://schema.org/Article">

  <!-- displays the post's thumbnail -->
  <div class="post-thumbnail">
      <a itemprop=thumbnailUrl href="<?php the_permalink() ?>">
      <span itemprop=image>
        <?php the_post_thumbnail('small-thumb'); ?>
      </span>
    </a>
  </div>
  <div class=excerpt-info>

    <!-- displays and links to the post title -->
    <h2 itemprop=headline class="post-title">
      <a href=" <?php the_permalink() ?> "><?php the_title(); ?></a>
    </h2>

      <!-- displaying post meta info -->
      <p class="post-meta"><span itemprop=dateCreated ><?php the_time('F jS, Y g:i a'); ?></span> |

      <!-- returns author and links -->
      by <a itemprop=author href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |

      <!-- returns category(ies) of posts -->
      posted in <?php
        $categories = get_the_category();
        $separator = ", ";
        $out = '';

        if($categories){
          foreach ($categories as $category) {
            $out .= '<a itemprop=articleSection href="'. get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $separator;
          }
        }
        echo trim($out, $separator);
      ?>
      </p>

    <div class=excerpt>
      <p itemprop=articleBody>
      <?php echo get_the_excerpt(); ?>
      <a itemprop=url href="<?php the_permalink(); ?>">Read more &raquo;</a>
      <span itemprop=dateModified class=updated-time>
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
