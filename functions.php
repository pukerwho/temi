<?php

if ( ! defined( 'TARAKAN_VERSION' ) ) {
	define( 'TARAKAN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tarakan_setup' ) ) :
	function tarakan_setup() {
		load_theme_textdomain( 'tarakan', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'tarakan' ),
        'footer' => esc_html__( 'Footer', 'tarakan' ),
        'main_cat' => esc_html__( 'Main Categories', 'tarakan' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'ginfo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'tarakan_setup' );

function tarakan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tarakan_content_width', 640 );
}
add_action( 'after_setup_theme', 'tarakan_content_width', 0 );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/comment-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/gutenberg-blocks.php';
}

require_once get_template_directory() . '/inc/filters.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

include('inc/enqueues.php');

function tarakan_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tarakan_scripts' );


require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

function my_custom_upload_mimes($mimes = array()) {
  $mimes['svg'] = "image/svg+xml";
  return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');

add_filter('show_admin_bar', '__return_false');

function create_post_type() {
  register_post_type( 'articles',
    array(
      'labels' => array(
          'name' => __( 'Статті' ),
          'singular_name' => __( 'Стаття' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

function get_site($site) {
  $site = str_replace( array('http://', 'https://', '/'), '', $site );
  return $site;
}

function site_text_color($site) {
  if (str_contains($site, 'bfb.org.ua')) {
    return "text-red-700";
  } elseif (str_contains($site, 'treba-solutions.com')) {
    return "text-orange-700";
  } elseif (str_contains($site, 'webgolovolomki.com')) {
    return "text-amber-700";
  } elseif (str_contains($site, 'icatalog.pro')) {
    return "text-yellow-700";
  } elseif (str_contains($site, 'tarakan.org.ua')) {
    return "text-lime-700";
  } elseif (str_contains($site, 'sdamkvartiry.com')) {
    return "text-green-700";
  } elseif (str_contains($site, 'priazovka.com')) {
    return "text-emerald-700";
  } elseif (str_contains($site, 'd-art.org.ua')) {
    return "text-teal-700";
  } elseif (str_contains($site, 'armadio.net.ua')) {
    return "text-cyan-700";
  } elseif (str_contains($site, 'book-cook.net')) {
    return "text-sky-700";
  } elseif (str_contains($site, 'bfb.org.ua')) {
    return "text-blue-700";
  } elseif (str_contains($site, 'odysseus.com.ua')) {
    return "text-indigo-700";
  } elseif (str_contains($site, 'santmat.net.ua')) {
    return "text-violet-700";
  } elseif (str_contains($site, 'freeapp.com.ua')) {
    return "text-purple-700";
  } elseif (str_contains($site, 'sviato.top')) {
    return "text-fuchsia-700";
  } elseif (str_contains($site, 'alekseev.com.ua')) {
    return "text-pink-700";
  } elseif (str_contains($site, 'bepretty.in.ua')) {
    return "text-rose-700";
  } elseif (str_contains($site, 'ortstom.in.ua')) {
    return "text-red-600";
  } elseif (str_contains($site, 'merkury.com.ua')) {
    return "text-orange-600";
  } elseif (str_contains($site, 'stp-press.info')) {
    return "text-amber-600";
  } elseif (str_contains($site, 'vrudenko.org.ua')) {
    return "text-yellow-600";
  } elseif (str_contains($site, 'tsystem.com.ua')) {
    return "text-lime-600";
  } elseif (str_contains($site, 'mikst.org.ua')) {
    return "text-green-600";
  } elseif (str_contains($site, 'kryazh.com.ua')) {
    return "text-emerald-600";
  } 
  return 'text-gray-700'; 
}

function site_bg_color($site) {
  if (str_contains($site, 'bfb.org.ua')) {
    return "bg-red-100";
  } elseif (str_contains($site, 'treba-solutions.com')) {
    return "bg-orange-100";
  } elseif (str_contains($site, 'webgolovolomki.com')) {
    return "bg-amber-100";
  } elseif (str_contains($site, 'icatalog.pro')) {
    return "bg-yellow-100";
  } elseif (str_contains($site, 'tarakan.org.ua')) {
    return "bg-lime-100";
  } elseif (str_contains($site, 'sdamkvartiry.com')) {
    return "bg-green-100";
  } elseif (str_contains($site, 'priazovka.com')) {
    return "bg-emerald-100";
  } elseif (str_contains($site, 'd-art.org.ua')) {
    return "bg-teal-100";
  } elseif (str_contains($site, 'armadio.net.ua')) {
    return "bg-cyan-100";
  } elseif (str_contains($site, 'book-cook.net')) {
    return "bg-sky-100";
  } elseif (str_contains($site, 'bfb.org.ua')) {
    return "bg-blue-100";
  } elseif (str_contains($site, 'odysseus.com.ua')) {
    return "bg-indigo-100";
  } elseif (str_contains($site, 'santmat.net.ua')) {
    return "bg-violet-100";
  } elseif (str_contains($site, 'freeapp.com.ua')) {
    return "bg-purple-100";
  } elseif (str_contains($site, 'sviato.top')) {
    return "bg-fuchsia-100";
  } elseif (str_contains($site, 'alekseev.com.ua')) {
    return "bg-pink-100";
  } elseif (str_contains($site, 'bepretty.in.ua')) {
    return "bg-rose-100";
  } elseif (str_contains($site, 'ortstom.in.ua')) {
    return "bg-red-50";
  } elseif (str_contains($site, 'merkury.com.ua')) {
    return "bg-orange-50";
  } elseif (str_contains($site, 'stp-press.info')) {
    return "bg-amber-50";
  } elseif (str_contains($site, 'vrudenko.org.ua')) {
    return "bg-yellow-50";
  } elseif (str_contains($site, 'tsystem.com.ua')) {
    return "bg-lime-50";
  } elseif (str_contains($site, 'mikst.org.ua')) {
    return "bg-green-50";
  } elseif (str_contains($site, 'kryazh.com.ua')) {
    return "bg-emerald-50";
  } 
  return 'bg-gray-100'; 
}