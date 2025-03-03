<?php 

function task_accept_function() {

  $post_id = stripslashes_deep($_POST['postId']);
  $author_id = get_post_meta($post_id, '_crb_tasks_author', true);
  $task_price = get_post_meta($post_id, '_crb_tasks_price', true);
  $author_balance = get_user_meta($author_id, '_crb_user_balance', true);
  $aurhor_balance_new = intval($author_balance) + $task_price;
  $author_temp_balance = get_user_meta($author_id, '_crb_user_balance_work', true);
  $author_temp_balance_new = intval($author_temp_balance) - $task_price;
  update_user_meta($author_id, '_crb_user_balance', $aurhor_balance_new);
  update_user_meta($author_id, '_crb_user_balance_work', $author_temp_balance_new);
  update_post_meta($post_id, '_crb_tasks_status', 'accept');

  create_new_article($post_id);

  echo 'hi';
  wp_die();
}

add_action('wp_ajax_task_accept_click_action', 'task_accept_function');
add_action('wp_ajax_nopriv_task_accept_click_action', 'task_accept_function');

function create_new_article($post_id) {
  $post_title = get_the_title($post_id);
  $post_site = get_post_meta($post_id, '_crb_tasks_site', true);
  $post_url = get_post_meta($post_id, '_crb_tasks_url', true);
  $post_keywords = get_post_meta($post_id, '_crb_tasks_keywords', true);
  $post_date = get_post_meta($post_id, '_crb_tasks_complete_date', true);

  $post_author_id = get_post_meta($post_id, '_crb_tasks_author', true);
  $post_user = get_user_by( 'ID', $post_author_id );
  $post_author_name = $post_user->display_name;

  $my_post = array(
    'post_title'    => $post_title,
    // 'post_name' => $meta_name,
    'post_status'   => 'publish',
    'post_type' => 'articles',
    'post_author'   => 1,
    'meta_input'   => array(
      '_crb_article_site' => $post_site,
      '_crb_article_date' => $post_date,
      '_crb_article_author' => $post_author_name,
      '_crb_article_link' => $post_url,
      '_crb_article_keywords' => $post_keywords,
    ),
  );
  wp_insert_post( $my_post );
}