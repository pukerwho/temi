<?php
function justread_filter_achive( $query ) {
  if (isset($_GET['article_site'])) {
    if ( $_GET['article_site'] != 'All' ) {
      $filter_article_site = array(
        'key' => '_crb_article_site',
        'value' => $_GET['article_site'],
        'compare' => 'LIKE'
      );  
    }
  }
  if (isset($_GET['article_author'])) {
    if ( $_GET['article_author'] != 'All') {
      $filter_article_author = array(
        'key' => '_crb_article_author',
        'value' => $_GET['article_author'],
        'compare' => 'LIKE'
      );  
    }
  }
  
  if (isset($_GET['article_orderby'])) {
    if ( $_GET['article_orderby'] != 'All') {
      $filter_article_orderby = $_GET['article_orderby'];
    }
  }
  if (isset($_GET['article_perpage'])) {
    $filter_article_perpage = $_GET['article_perpage'];
  } else {
    $filter_article_perpage = 20;
  }
  $query->set('meta_query',  array(
    'relation' => 'AND',
    array(
      'relation' => 'AND',
      $filter_article_site,
      $filter_article_author,
    )
  ));
  $query->set('meta_key', $filter_article_orderby);
  $query->set('orderby', 'meta_value_num');
  $query->set('posts_per_page', $filter_article_perpage);
  clear_articles_cache();
  return $query;
}
add_action( 'pre_get_posts','justread_filter_achive');
