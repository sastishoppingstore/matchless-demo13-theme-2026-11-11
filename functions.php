<?php
function matchless_demo13_setup(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  register_nav_menus(array('primary'=>'Primary Menu','footer'=>'Footer Menu'));
}
add_action('after_setup_theme','matchless_demo13_setup');
function matchless_demo13_assets(){
  wp_enqueue_style('matchless-demo13-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_style('matchless-demo13-fonts','https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap', array(), null);
  wp_enqueue_script('matchless-demo13-js', get_template_directory_uri().'/assets/demo13.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts','matchless_demo13_assets');
function matchless_demo13_get_content(){
  $p = get_template_directory().'/inc/content.json';
  if(!file_exists($p)) return array('packages'=>array(),'pages'=>array());
  return json_decode(file_get_contents($p), true);
}
function matchless_demo13_get_rates(){
  $p = get_template_directory().'/inc/rates.json';
  if(!file_exists($p)) return array();
  return json_decode(file_get_contents($p), true);
}
