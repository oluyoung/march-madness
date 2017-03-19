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
