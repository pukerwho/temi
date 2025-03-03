<?php 

function remove_task_function() {

  $post_id = stripslashes_deep($_POST['postId']);
  $author_id = get_post_meta($post_id, '_crb_tasks_author', true);
  $task_price = get_post_meta($post_id, '_crb_tasks_price', true);
  $get_temp_balance = get_user_meta($author_id, '_crb_user_balance_work', true);
  update_post_meta( $post_id, '_crb_tasks_author', '' );
  update_post_meta( $post_id, '_crb_tasks_status', '' );
  $new_temp_balance = intval($get_temp_balance) - $task_price;
  update_user_meta( $author_id, '_crb_user_balance_work', $new_temp_balance );
  echo 'hi';
  wp_die();
}

add_action('wp_ajax_remove_task_click_action', 'remove_task_function');
add_action('wp_ajax_nopriv_remove_task_click_action', 'remove_task_function');