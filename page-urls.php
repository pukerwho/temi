<?php
/*
Template Name: URLS
*/
?>
<?php 
get_header(); 
$current_user_id = get_current_user_id();

?>

<?php if ($current_user_id === 1 || $current_user_id === 2): ?>

  <div class="py-12 px-4">
    <?php 
      $new_posts = get_cached_articles();
      if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
    ?>
      <div><?php echo carbon_get_the_post_meta('crb_article_link'); ?></div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
<?php endif; ?>