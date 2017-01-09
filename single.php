<?php get_header(); ?>

<section id=single-post class=single-post-page>
  <?php get_sidebar(); ?>
  <section id=content>
    <!-- Post itself-->
    <article id=post itemscope itemtype=https://schema.org/Article class="<?php if(has_post_thumbnail() ): ?>post-has-thumbnail <?php else: ?>post-no-thumbnail <?php endif; ?> ">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <section id=post-content>
        <!-- Post Title -->
        <h1 class=post-title id=post-title itemprop=headline><?php the_title(); ?></h1>

        <!-- Post Thumbnail -->
        <div id=post-thumbnail>
          <span itemprop=image><?php the_post_thumbnail('banner-img'); ?></span>
        </div>

        <!-- Content -->
        <main class="post-content" itemprop=articleBody>
            <?php the_content(); ?>
        </main>
      </section>

      <!-- Post Meta -->
      <aside class=post-meta id=post-meta>
        <!-- Date Created -->
        <span itemprop=dateCreated>
          <span class=meta-icon id=meta-date-icon></span>
          <?php the_time("D jS M, 'y"); ?>
        </span>
        <span itemprop=dateModified>
          <span class=meta-icon id=meta-date-icon></span>
          <span class=meta-icon id=meta-date-edited-icon></span>
          <?php
          if(get_the_modified_time('U')>get_the_time('U')){
              echo get_the_modified_time("d/m/y g:i a");
          }
          ?>
        </span>

        <!-- Author -->
        <a itemprop=author href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
          <span class=meta-icon id=meta-author-icon></span>
          <?php the_author(); ?>
        </a>

        <!-- Category(ies) of Posts -->
        <span>
          <span class=meta-icon id=meta-cat-icon></span>
          <?php
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
        </span>
      </aside>
      <?php
        endwhile;
        else:
          echo "<h4 class=no-content>No content found</h4>";
        endif;
      ?>
    </article>
    <!-- Next and Previous Post -->
    <section id=more-post-links class=clearfix>
      <span id="prev-post"><?php previous_post_link(); ?></span>
      <span id="next-post"><?php next_post_link(); ?></span>
    </section>
    <!-- Post Comment -->
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
