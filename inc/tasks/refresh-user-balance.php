<?php 

function balance_refresh_function() {

  $user_id = stripslashes_deep($_POST['userId']);
  update_user_meta( $user_id, '_crb_user_balance', '0' );

  echo 'hi';
  wp_die();
}

add_action('wp_ajax_balance_refresh_click_action', 'balance_refresh_function');
add_action('wp_ajax_nopriv_balance_refresh_click_action', 'balance_refresh_function');