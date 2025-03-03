<?php 

function task_reject_function() {

  $post_id = stripslashes_deep($_POST['postId']);
  $reject_message = stripslashes_deep($_POST['rejectMessage']);
  update_post_meta( $post_id, '_crb_tasks_status', 'reject' );
  update_post_meta( $post_id, '_crb_tasks_reject', $reject_message );

  echo 'hi';
  wp_die();
}

add_action('wp_ajax_task_reject_click_action', 'task_reject_function');
add_action('wp_ajax_nopriv_task_reject_click_action', 'task_reject_function');