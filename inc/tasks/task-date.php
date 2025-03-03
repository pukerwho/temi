<?php 

function taskFinishDate($get_time_task, $get_time_complete_task) {
  $start = date("Y/m/d H:i:s", $get_time_task);
  $finish = date("Y/m/d H:i:s", $get_time_complete_task);
  $start_datetime = new DateTime($start);
  $diff = $start_datetime->diff(new DateTime($finish)); 
  $hours = $diff->h;
  $hours = $hours + ($diff->days*24);
  return $hours;
}

function taskContinueDate($get_time_task) {
  $start = date("Y/m/d H:i:s", $get_time_task);
  $start_datetime = new DateTime($start);
  $current_time = current_time( 'Y/m/d H:i:s' );
  $diff = $start_datetime->diff(new DateTime($current_time)); 
  $hours = $diff->h;
  $hours = $hours + ($diff->days*24);
  // var_dump($diff);
  return $hours;
}

?>