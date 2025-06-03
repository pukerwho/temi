<table class="articles min-w-max table-auto whitespace-nowrap text-sm mb-6">
  <thead>
    <tr class="border-b border-gray-200 text-left font-medium  bg-black/80 text-gray-200">
      <th id="resizable-column" class="border-r p-2">Назва статті
        <div class="resizer"></div>
      </th>
      <th class="border-r p-2">Keywords</th>
      <th class="border-r p-2">Ahrefs Traffic</th>
      <th class="border-r p-2">Кліки</th>
      <th class="border-r p-2">Покази</th>
      <th class="p-2">Ключові фрази</th>
    </tr>
  </thead>
  <tbody id="response" class="text-sm">
    <?php 
      global $wp_query, $wp_rewrite;  
      $wp_query->query_vars['page'] > 1 ? $current = $wp_query->query_vars['page'] : $current = 1;
      $meta_query = [];
      if (!empty($_GET['s'])) {
        $meta_query[] = [
          'key'     => 'tag', // або заміни на відповідне мета-поле
          'value'   => sanitize_text_field($_GET['s']),
          'compare' => 'LIKE',
        ];
      }
      $new_posts = new WP_Query( array(
        'post_type' => 'articles',
        'posts_per_page' => 20,
        'order' => 'DESC',
        'fields' => 'ids',
        'paged' => $current,
        'meta_query' => $meta_query,
      ));
      if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
    ?>
      <?php get_template_part('template-parts/guest-article-item'); ?>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </tbody>
</table>