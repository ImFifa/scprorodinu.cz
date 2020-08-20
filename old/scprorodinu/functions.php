<?php

// adding the CSS and JS files

function gt_setup(){
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700&display=swap');
    wp_enqueue_style( 'fontawesome', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.2.1.slim.min.js');
    wp_enqueue_script( 'popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action( 'wp_enqueue_scripts', 'gt_setup');

// adding Theme Support

function gt_init() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5',
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action( 'after_setup_theme', 'gt_init');

// activities post type

function gt_custom_post_type() {
    register_post_type( 'sc_activity',
        array(
            'rewrite' => array('slug' => 'aktivity'),
            'labels' => array(
                'name' => 'Aktivity',
                'singular_name' => 'Aktivita',
                'add_new_item' => 'Přidat aktivitu',
                'edit_item' => 'Upravit aktivitu'
            ),
            'menu-icon' => 'dashicons-universal-access',
            'public' => true,
            'has_archive' => false,
            'menu_position' => 5,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
            )
        )
    );
}

add_action( 'init', 'gt_custom_post_type');

// services post type
function create_posttype() {
    register_post_type( 'sc_services',
    array(
        'rewrite' => array('slug' => 'sluzby'),
        'labels' => array(
            'name' => __( 'Služby' ),
            'singular_name' => __( 'Služba' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 6,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        )
    )
  );
}
add_action( 'init', 'create_posttype' );
