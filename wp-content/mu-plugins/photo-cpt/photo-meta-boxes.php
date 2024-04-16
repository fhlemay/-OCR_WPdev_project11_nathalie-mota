<?php

// define('POST_TYPE_SLUG', 'photo');

// Remove the default meta boxes of custom taxonomies to replace them with a custom versions.
function custom_remove_default_taxonomies()
{
  remove_meta_box('tagsdiv-categorie', POST_TYPE_SLUG, 'side');
  remove_meta_box('tagsdiv-format', POST_TYPE_SLUG, 'side');
}
add_action('admin_menu', 'custom_remove_default_taxonomies');

function custom_add_taxonomy_meta_boxes() {
  add_meta_box(
    'custom_categorie_meta_box', 
    __('Catégories', 'nathalie-mota'), 
    'custom_categorie_meta_box_html',
    POST_TYPE_SLUG, 
    'normal',
    'default'
  );

  add_meta_box(
    'custom_format_meta_box',
    __('Format', 'nathalie-mota'),
    'custom_format_meta_box_html',
    POST_TYPE_SLUG,
    'normal',
    'default');
}
add_action('add_meta_boxes', 'custom_add_taxonomy_meta_boxes');

function custom_categorie_meta_box_html($post) {
    wp_nonce_field('custom_categorie_nonce_action', 'custom_categorie_nonce_name');
    $terms = get_terms(array('taxonomy' => 'categorie', 'hide_empty' => false));
    foreach ($terms as $term) {
        $checked = has_term($term->term_id, 'categorie', $post) ? 'checked' : '';
        echo '<input type="checkbox" name="categorie[]" value="' . esc_attr($term->term_id) . '" ' . $checked . '> ' . esc_html($term->name) . '<br />';
    }
}

function custom_format_meta_box_html($post) {
    wp_nonce_field('custom_format_nonce_action', 'custom_format_nonce_name');
    $terms = get_terms(array('taxonomy' => 'format', 'hide_empty' => false));
    foreach ($terms as $term) {
        $checked = has_term($term->term_id, 'format', $post) ? 'checked' : '';
        echo '<input type="radio" name="format" value="' . esc_attr($term->term_id) . '" ' . $checked . '> ' . esc_html($term->name) . '<br />';
    }
}

function custom_save_taxonomy_meta($post_id) {

  // Check if it's a valid nonce
  if (!isset($_POST['custom_categorie_nonce_name'], $_POST['custom_format_nonce_name']) 
    || !wp_verify_nonce($_POST['custom_categorie_nonce_name'], 'custom_categorie_nonce_action') 
    || !wp_verify_nonce($_POST['custom_format_nonce_name'], 'custom_format_nonce_action')) {
    return;
  }

  // Check if the current user can edit the post
  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  // Saving logic for 'categorie' taxonomy
  if (isset($_POST['categorie'])) {
      $categorie = array_map('intval', $_POST['categorie']);
      wp_set_object_terms($post_id, $categorie, 'categorie');
  } else {
      wp_set_object_terms($post_id, [], 'categorie');
  }

  // Saving logic for 'format' taxonomy
  if (!empty($_POST['format'])) {
      $format = intval($_POST['format']);
      wp_set_object_terms($post_id, $format, 'format');
  } else {
      wp_set_object_terms($post_id, [], 'format');
  }
}
add_action('save_post_photo', 'custom_save_taxonomy_meta');

function custom_admin_styles() {
    echo '<style>
        #custom_categorie_meta_box { 
            float: left; 
            width: 40%; 
            margin-right: 15px;
        }
        #custom_format_meta_box { 
            float: left; 
            width: 40%; 
        }
    </style>';
}
add_action('admin_head', 'custom_admin_styles');

