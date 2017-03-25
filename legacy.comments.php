<?php

if ( post_password_required() ) {
  echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
  return;
}

if ( have_comments() ) : ?>
<h4 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h4>
<ul class="commentlist">
  <?php wp_list_comments('callback=march_comments'); ?>
</ul>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) :
    // If comments are open, but there are no comments.
  else : // comments are closed
  endif;
endif;

?>
