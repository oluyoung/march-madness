<?php get_header(); ?>

<section id="single-post" class="single-post-page page-content">
  <?php get_sidebar(); ?>
  <section id="content" class="content">
    <!-- Post itself-->
    <article id=post itemscope itemtype=https://schema.org/Article class="<?php if(has_post_thumbnail() ): ?>post-has-thumbnail <?php else: ?>post-no-thumbnail <?php endif; ?> ">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <section id="post-content" <?php post_class(); ?>>
        <!-- Post Title -->
        <h1 class="post-title " id="post-title" itemprop="headline"><?php the_title(); ?></h1>

        <!-- Post Thumbnail -->
        <div id="post-thumbnail">
          <span itemprop="image"><?php the_post_thumbnail('banner-img'); ?></span>
        </div>

        <!-- Post Meta to be displayed on small devices (above content) -->
        <aside class="post-meta-xs top">
          <!-- Date Created -->
          <span class="meta-info date-created" itemprop=dateCreated>
            <span class=meta-icon id=meta-date-icon><?php echo get_svg(array('icon'=>'calendar')); ?></span>
            <span class="time-xs"><?php the_time("d-m-y"); ?></span>
            <span class="time-md"><?php the_time("D jS M, 'y"); ?></span>
          </span>
          <!-- Author -->
          <span class="meta-info authors">
            <a itemprop=author href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
              <span class="meta-icon" id="meta-author-icon"><?php echo get_svg(array('icon'=>'user')); ?></span>
              <?php the_author(); ?>
            </a>
          </span>
          <!-- Comments Number -->
          <span class="meta-info comments_num">
            <span class="meta-icon" id=meta-comments-icon><?php echo get_svg(array('icon'=>'bubbles')); ?></span>
            <span><?php echo get_comments_number(); ?></span>
          </span>
        </aside>

        <!-- Content -->
        <main class="post-content" itemprop="articleBody">
            <?php the_content(); ?>
        </main>
        <!-- Post Meta to be displayed on small devices (below content) -->
        <aside class="post-meta-xs btm">
          <!-- Category(ies) of Posts -->
          <span class="meta-info categories">
            <span class="meta-icon" id="meta-cat-icon"><?php echo get_svg(array('icon'=>'folder-open')); ?></span>
            <?php get_template_part( 'templates/list_post_categories'); ?>
          </span>
          <!-- Tags associated with Posts -->
          <span class="meta-info tags">
            <span class="meta-icon" id=meta-tag-icon><?php echo get_svg(array('icon'=>'hashtag')); ?></span>
            <span class="tags-list"> <?php the_tags('', ', ', '' ); ?> </span>
          </span>
        </aside>

        <!-- Post Pages Links -->
        <?php wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'march' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          ) );
        ?>

        <!-- Next and Previous Post -->
        <section id=more-post-links class=clearfix>
          <span id="prev-post"><?php previous_post_link(); ?></span>
          <span id="next-post"><?php next_post_link(); ?></span>
        </section>
      </section>

      <!-- Post Meta -->
      <aside class=post-meta id=post-meta>
        <!-- Date Created -->
        <span class="meta-info date-created" itemprop=dateCreated>
          <span class=meta-icon id=meta-date-icon><?php echo get_svg(array('icon'=>'calendar')); ?></span>
          <?php the_time("D jS M, 'y"); ?>
        </span>
        <!-- Last Date Modified -->
        <span class="meta-info date-modified" itemprop=dateModified>
          <span class=meta-icon id=meta-date-icon><?php echo get_svg(array('icon'=>'calendar')); ?></span>
          <span class=meta-icon id=meta-date-edited-icon><?php echo get_svg(array('icon'=>'pencil')); ?></span>
          <?php
            if(get_the_modified_time('U')>get_the_time('U')) echo get_the_modified_time("d/m/y g:i a");
          ?>
        </span>
        <!-- Author -->
        <span class="meta-info authors">
          <a itemprop=author href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <span class="meta-icon" id="meta-author-icon"><?php echo get_svg(array('icon'=>'user')); ?></span>
            <?php the_author(); ?>
          </a>
        </span>
        <!-- Category(ies) of Posts -->
        <span class="meta-info categories">
          <span class="meta-icon" id="meta-cat-icon"><?php echo get_svg(array('icon'=>'folder-open')); ?></span>
            <?php get_template_part('templates/list_post_categories'); ?>
        </span>
        <!-- Tags associated with Posts -->
        <span class="meta-info tags">
          <span class="meta-icon" id=meta-tag-icon><?php echo get_svg(array('icon'=>'hashtag')); ?></span>
        </span>
        <!-- Comments Number -->
        <span class="meta-info comments_num">
          <span class="meta-icon" id=meta-comments-icon><?php echo get_svg(array('icon'=>'bubbles')); ?></span>
          <span><?php echo get_comments_number(); ?></span>
        </span>
      </aside>
      <?php
        endwhile;
        // Error Message
        else:
          echo "<h4 class=no-content>No content found</h4>";
        endif;
      ?>
    </article>
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
