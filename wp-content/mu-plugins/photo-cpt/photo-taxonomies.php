<?php
function create_photo_taxonomies()
{

  // Register Taxonomies for the Post Type
  register_taxonomy('categorie', 'photo', array(
    'labels' => array(
      'name' => _x('Catégories', 'taxonomy general name', 'nathalie-mota'),
      'singular_name' => _x('Catégorie', 'taxonomy singular name', 'nathalie-mota'),
    ),
    'rewrite' => array('slug' => 'categorie'),
    'show_in_rest' => false, // no Gutenberg please!
    'hierarchical' => false,
  ));

  register_taxonomy('format', 'photo', array(
    'labels' => array(
      'name' => _x('Formats', 'taxonomy general name', 'nathalie-mota'),
      'singular_name' => _x('Format', 'taxonomy singular name', 'nathalie-mota'),
    ),
    'rewrite' => array('slug' => 'format'),
    'show_in_rest' => false, // no Gutenberg please!
    'hierarchical' => false,
  ));

  // New formats to add
  $formats = ['paysage', 'portrait'];
  foreach ($formats as $format) {
    if (!term_exists($format, 'format')) {
      wp_insert_term($format, 'format');
    }
  }

  // New categories to add
  $categories = ['réception', 'concert', 'mariage', 'télévision'];
  foreach ($categories as $category) {
    if (!term_exists($category, 'categorie')) {
      wp_insert_term($category, 'categorie');
    }
  }
}
add_action('init', 'create_photo_taxonomies');
