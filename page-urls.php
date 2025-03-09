<?php
/*
Template Name: URLS
*/
?>
<?php 
get_header(); 
$current_user_id = get_current_user_id();

?>

<?php if ($current_user_id === 1 ): ?>

  <div class="py-12 px-4">
    <?php 
      $new_posts = new WP_Query( array(
        'post_type' => 'articles', 
        'posts_per_page' => -1,
        'order' => 'DESC',
        'fields' => 'ids',
      ));
      if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
    ?>
      <div><?php echo carbon_get_the_post_meta('crb_article_link'); ?></div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
<?php endif; ?>