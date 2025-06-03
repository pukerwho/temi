<?php
function justread_filter_achive( $query ) {
  if ( !is_admin() && is_post_type_archive('articles') ) {

    $meta_query = ['relation' => 'AND'];

    if (isset($_GET['article_site']) && $_GET['article_site'] !== 'All') {
      $meta_query[] = array(
        'key' => '_crb_article_site',
        'value' => $_GET['article_site'],
        'compare' => 'LIKE'
      );
    }

    if (isset($_GET['article_author']) && $_GET['article_author'] !== 'All') {
      $meta_query[] = array(
        'key' => '_crb_article_author',
        'value' => $_GET['article_author'],
        'compare' => 'LIKE'
      );
    }

    if (!empty($_GET['s'])) {
      $search_term = sanitize_text_field($_GET['s']);
      // $search_term = str_replace(['“', '”', '‘', '’', '–', '—', '―'], ['"', '"', "'", "'", '-', '-', '-'], $search_term);
    
      // Пошук і в title, і в ключових словах
      $meta_query[] = array(
        'relation' => 'OR',
        array(
          'key' => '_crb_article_keywords',
          'value' => $search_term,
          'compare' => 'LIKE',
        ),
        array(
          'key' => '_crb_article_title',
          'value' => $search_term,
          'compare' => 'LIKE',
        ),
      );
      // $query->set('s', $search_term);
    }

    $query->set('meta_query', $meta_query);

    if (isset($_GET['article_orderby']) && $_GET['article_orderby'] !== 'All') {
      $query->set('meta_key', $_GET['article_orderby']);
      $query->set('orderby', 'meta_value_num');
    }

    $query->set('posts_per_page', isset($_GET['article_perpage']) ? (int)$_GET['article_perpage'] : 20);

    clear_articles_cache();
    return $query;
  }
}
add_action( 'pre_get_posts','justread_filter_achive');