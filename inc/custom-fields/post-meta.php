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
      Field::make( 'text', 'crb_article_ahrefs_traffic', 'Ahrefs Traffic' ),
      Field::make( 'text', 'crb_article_google_click', 'Кліки' ),
      Field::make( 'text', 'crb_article_google_views', 'Покази' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'tasks' )
    ->add_fields( array(
      Field::make( 'text', 'crb_tasks_author', 'Автор' ),
      Field::make( 'text', 'crb_tasks_site', 'Сайт' ),
      Field::make( 'text', 'crb_tasks_price', 'Ціна' ),
      Field::make( 'text', 'crb_tasks_keywords', 'Ключі' ),
      Field::make( 'text', 'crb_tasks_url', 'URL' ),
      Field::make( 'text', 'crb_tasks_author_date', 'Час, коли автор взяв завдання' ),
      Field::make( 'text', 'crb_tasks_complete_date', 'Час, коли автор виконав завдання' ),
      Field::make( 'text', 'crb_tasks_status', 'Статус' ),
      Field::make( 'textarea', 'crb_tasks_reject', 'Зауваження' ),
      Field::make( 'text', 'crb_tasks_ahrefs', 'Ahrefs keywords' ),
      
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'websites' )
    ->add_fields( array(
      Field::make( 'text', 'crb_website_url', 'URL сайта' ),
      Field::make( 'text', 'crb_website_balance', 'Витрачено' ),
  ) );
  
}

?>