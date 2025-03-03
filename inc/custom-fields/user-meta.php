<?php 
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'user_meta', 'Address' )
->add_fields( array(
  Field::make( 'text', 'crb_user_balance', 'Баланс' ),
  Field::make( 'text', 'crb_user_balance_work', 'В роботі' ),
) );