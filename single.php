<?php get_header(); ?>

<section id=single-post-page>
  <?php get_sidebar(); ?>
  <section id=content>
    <article id=post itemscope itemtype=https://schema.org/Article>
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <section id=post-content>
      <!-- Post Title -->
      <h1 id=post-title itemprop=headline><?php the_title(); ?></h1>

      <!-- Post Thumbnail -->
      <?php if(has_post_thumbnail() ): ?>
        <div id=post-thumbnail>
          <span itemprop=image><?php the_post_thumbnail('banner-img'); ?></span>
        </div>
      <?php endif; ?>

      <!-- Content -->
      <main class="single-content" itemprop=articleBody>
          <?php the_content(); ?>
      </main>
      </section>

      <!-- Post Meta -->
      <aside id=post-meta>
        <!-- Date Created -->
        <span itemprop=dateCreated>
          <?php the_time("D jS, 'y"); ?>
        </span>
        <span itemprop=dateModified>
          <?php
          if(get_the_modified_time('U')>get_the_time('U')){
              echo 'Last updated: '.get_the_modified_time("d/m/y g:i a");
          }
          ?>
        </span>

        <!-- Author -->
        <span itemprop=author href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
          <?php the_author(); ?>
        </span>

        <!-- Category(ies) of Posts -->
        <span>
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
    <section id=more-post-links></section>
    <!-- Post Comment -->
    <section id=post-comments></section>
  </section>
</section>

<?php get_footer(); ?>
