<?php 

function add_link_function() {

  $post_id = stripslashes_deep($_POST['postId']);
  $post_link = stripslashes_deep($_POST['taskLink']);
  $task_complete_date = current_time( 'timestamp' );
  $get_task_complete_date = get_post_meta($post_id, '_crb_tasks_complete_date', true);

  update_post_meta( $post_id, '_crb_tasks_url', $post_link );
  update_post_meta( $post_id, '_crb_tasks_status', 'check' );

  if ($get_task_complete_date === '') {
    update_post_meta( $post_id, '_crb_tasks_complete_date', $task_complete_date );
  }

  echo 'hi';
  wp_die();
}

add_action('wp_ajax_add_link_click_action', 'add_link_function');
add_action('wp_ajax_nopriv_add_link_click_action', 'add_link_function');