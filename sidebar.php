<?php
/**
 * The sidebar containing the main widget area
 * @package Trevor Young
 * @subpackage March Madness
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebarindex' ) ) {
  return;
}
?>

<aside class="sidebar" role="complementary">
  <?php dynamic_sidebar( 'sidebarindex' ); ?>
</aside><!-- #secondary -->
