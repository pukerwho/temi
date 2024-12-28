<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'articles' )
    ->add_fields( array(
      Field::make( 'checkbox', 'crb_article_complete', 'Завдання виконано' ),
      Field::make( 'text', 'crb_article_site', 'Сайт' ),
      Field::make( 'date', 'crb_article_date', 'Дата' ),
      Field::make( 'text', 'crb_article_author', 'Автор' ),
      Field::make( 'text', 'crb_article_link', 'Посилання' ),
      Field::make( 'text', 'crb_article_keywords', 'Ключові посилання' ),
      Field::make( 'text', 'crb_article_ahrefs', 'Keywords' ),
      Field::make( 'text', 'crb_article_google_click', 'Кліки' ),
      Field::make( 'text', 'crb_article_google_views', 'Покази' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'websites' )
    ->add_fields( array(
      Field::make( 'text', 'crb_websites_orders', 'Замовлень' ),
      Field::make( 'text', 'crb_websites_dr', 'DR' ),
      Field::make( 'text', 'crb_websites_keywords', 'Keywords' ),
      Field::make( 'text', 'crb_websites_tf', 'TF' ),
      Field::make( 'text', 'crb_websites_cf', 'CF' ),
      Field::make( 'text', 'crb_websites_ga', 'GA' ),
      Field::make( 'text', 'crb_websites_gsc', 'GSC' ),
      // Field::make( 'text', 'crb_websites_week', 'Update Week' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'drops' )
    ->add_fields( array(
      Field::make( 'text', 'crb_drops_dr', 'DR' ),
      Field::make( 'text', 'crb_drops_tf', 'TF' ),
      Field::make( 'text', 'crb_drops_cf', 'CF' ),
      Field::make( 'text', 'crb_drops_expired', 'Expired' ),
      Field::make( 'association', 'crb_drops_websites', 'Сайти')
      ->set_types( array(
        array(
          'type'      => 'post',
          'post_type' => 'websites',
        )
      ) )
      // Field::make( 'text', 'crb_websites_week', 'Update Week' ),
  ) );
  
}

?>