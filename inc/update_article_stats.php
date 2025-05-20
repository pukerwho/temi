<?php 
add_action('wp_ajax_update_article_stats', 'update_article_stats');
function update_article_stats() {
  $args = [
    'post_type' => 'articles',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'fields' => 'ids',
  ];
  $posts = get_posts($args);

  $author_stats = [];
  $site_stats = [];

  foreach ($posts as $post_id) {
    $author = carbon_get_post_meta($post_id, 'crb_article_author');
    $link = carbon_get_post_meta($post_id, 'crb_article_link');
    $host = parse_url($link, PHP_URL_HOST);

    $clicks = (int) carbon_get_post_meta($post_id, 'crb_article_google_click');
    $views = (int) carbon_get_post_meta($post_id, 'crb_article_google_views');
    $keywords = (int) carbon_get_post_meta($post_id, 'crb_article_ahrefs');

    // By author
    if (!isset($author_stats[$author])) {
      $author_stats[$author] = ['name' => $author, 'count' => 0, 'clicks' => 0, 'keywords' => 0, 'zero_views' => 0, 'zero_keywords' => 0];
    }
    $a = &$author_stats[$author];
    $a['count']++;
    $a['clicks'] += $clicks;
    $a['keywords'] += $keywords;
    if ($views === 0) $a['zero_views']++;
    if ($keywords === 0) $a['zero_keywords']++;

    // By site
    if (!isset($site_stats[$host])) {
      $site_stats[$host] = ['name' => $host, 'count' => 0, 'clicks' => 0, 'keywords' => 0, 'zero_views' => 0, 'zero_keywords' => 0];
    }
    $s = &$site_stats[$host];
    $s['count']++;
    $s['clicks'] += $clicks;
    $s['keywords'] += $keywords;
    if ($views === 0) $s['zero_views']++;
    if ($keywords === 0) $s['zero_keywords']++;
  }

  $response = [
    'authors' => array_values($author_stats),
    'sites' => array_values($site_stats),
  ];

  $update_article_stats_date = current_time( 'timestamp' );
  update_option('update_article_stats_date', $update_article_stats_date);
  update_option('article_stats_cache', $response);

  // wp_send_json($response);
}

// add_action('wp_ajax_get_cached_article_stats', function() {
//   $data = get_option('article_stats_cache', ['authors' => [], 'sites' => []]);
//   wp_send_json($data);
// });