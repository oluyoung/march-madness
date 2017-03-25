<article class="post format-standard post-video post-media">
    <!-- displaying post title -->
    <h2 class="post-title"> <a href=" <?php the_permalink() ?> "><?php the_title(); ?></a> </h2>
    <!-- displaying post meta info -->
    <?php get_template_part('templates/post_meta_template'); ?>
    <!-- displaying post content since no excerpt -->
    <div class="media-excerpt video-excerpt"><?php the_content(); ?></div>
</article>
