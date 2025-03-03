<?php 

function get_task_work_function() {

  $post_id = stripslashes_deep($_POST['postId']);
  $task_author = stripslashes_deep($_POST['taskAuthor']);
  $task_author_date = current_time( 'timestamp' );
  
  $get_temp_balance = get_user_meta($task_author, '_crb_user_balance_work', true);
  $task_price = get_post_meta($post_id, '_crb_tasks_price', true);
  $get_current_task_author = get_post_meta( $post_id, '_crb_tasks_author', true );
  if ($get_current_task_author === '') {
    if ( metadata_exists( 'post', $post_id, '_crb_tasks_author' ) ) {
      update_post_meta( $post_id, '_crb_tasks_author', $task_author );
      update_post_meta( $post_id, '_crb_tasks_status', 'work' );
      update_post_meta( $post_id, '_crb_tasks_author_date', $task_author_date );
    } else {
      add_post_meta( $post_id, '_crb_tasks_author', $task_author, true );
      add_post_meta( $post_id, '_crb_tasks_status', 'work' );
      add_post_meta( $post_id, '_crb_tasks_author_date', $task_author_date, true );
    }
    $new_temp_balance = intval($get_temp_balance) + $task_price;
    update_user_meta( $task_author, '_crb_user_balance_work', $new_temp_balance );
    $check = "good"; 
  } else {
    //вже хтось взяв
    $check = "bad";
  }
  echo $check;
  wp_die();
}

add_action('wp_ajax_get_task_work_click_action', 'get_task_work_function');
add_action('wp_ajax_nopriv_get_task_work_click_action', 'get_task_work_function');