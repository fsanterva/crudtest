<?php
//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css() {
  wp_dequeue_style( 'dashicons' );
  wp_dequeue_style( 'wp-block-library' );
  wp_deregister_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-blocks-style' );
}

function init_enqueue(){
  add_action( 'wp_enqueue_scripts', 'assets', 10 );
  add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 9 );
  add_action( 'admin_init', 'admin_files' );
}

function assets() {
  wp_enqueue_script( 'b2b-lazyload', get_template_directory_uri() . '/assets/js/lazyload.js', [], '', true );
  wp_enqueue_script( 'b2b-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '', true );
  wp_enqueue_script( 'b2b-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );
//   wp_enqueue_style( 'b2b-main', get_template_directory_uri() . '/assets/css/tempstyle.css', '', true );
}

function admin_files() {
  wp_register_style( 'b2b-admin-acf', get_template_directory_uri() .'/assets/css/admin_acf.css' );
  wp_enqueue_style( 'b2b-admin-acf' );
  wp_register_script( 'b2b-admin-script', get_template_directory_uri() .'/assets/js/admin_acf.js' );
  wp_enqueue_script( 'b2b-admin-script' );
}

init_enqueue();