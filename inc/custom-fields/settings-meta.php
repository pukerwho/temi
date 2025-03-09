<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Штаб') )
  ->add_tab( __('Загальні'), array(
    Field::make( 'date', 'crb_last_update', 'Дана оновлення' )->set_storage_format( 'M d' ),
  ))
  ->add_tab( __('Сайти'), array(
    Field::make( 'text', 'crb_website_wunder2_com_ua', 'Wunder2' ),
    Field::make( 'text', 'crb_website_wcdt_com_ua', 'Wcdt' ),
    Field::make( 'text', 'crb_website_investif_in_ua', 'Investif' ),
    Field::make( 'text', 'crb_website_rahlina_com_ua', 'Rahlina' ),
    Field::make( 'text', 'crb_website_m-cg_com_ua', 'M-cg' ),
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' ),
    
  ));
}

?>