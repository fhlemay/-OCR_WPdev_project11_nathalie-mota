<?php
function create_photo_post_type()
{
  // Labels for the Post Type
  $labels = array(
    'name'                  => _x('Photos', 'Post type general name', 'nathalie-mota'),
    'singular_name'         => _x('Photo', 'Post type singular name', 'nathalie-mota'),
    'menu_name'             => _x('Photos', 'Admin Menu text', 'nathalie-mota'),
    'name_admin_bar'        => _x('Photo', 'Add New on Toolbar', 'nathalie-mota'),
    'add_new'               => __('Ajouter photo', 'nathalie-mota'),
    'add_new_item'          => __('Ajouter nouvelle photo', 'nathalie-mota'),
    'new_item'              => __('Nouvelle photo', 'nathalie-mota'),
    'edit_item'             => __('Éditer photo', 'nathalie-mota'),
    'view_item'             => __('Voir photo', 'nathalie-mota'),
    'all_items'             => __('Toutes les photos', 'nathalie-mota'),
    'search_items'          => __('Rechercher photos', 'nathalie-mota'),
    'parent_item_colon'     => __('Photo parente:', 'nathalie-mota'),
    'not_found'             => __('Aucune photo trouvée.', 'nathalie-mota'),
    'not_found_in_trash'    => __('Aucune photo trouvée dans la corbeille.', 'nathalie-mota'),
    'featured_image'        => _x('Photo couverture', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'nathalie-mota'),
    'set_featured_image'    => _x('Définir la photo couverture', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'nathalie-mota'),
    'remove_featured_image' => _x('Retirer la photo couverture', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'nathalie-mota'),
    'use_featured_image'    => _x('Utiliser comme photo couverture', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'nathalie-mota'),
    'archives'              => _x('Archives des photos', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'nathalie-mota'),
    'insert_into_item'      => _x('Insérer dans photo', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'nathalie-mota'),
    'uploaded_to_this_item' => _x('Téléversé sur cette photo', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'nathalie-mota'),
    'filter_items_list'     => _x('Filtrer la liste des photos', 'Screen reader text for the filter links heading on the post type listing screen. Added in 4.4', 'nathalie-mota'),
    'items_list_navigation' => _x('Navigation liste des photos', 'Screen reader text for the pagination heading on the post type listing screen. Added in 4.4', 'nathalie-mota'),
    'items_list'            => _x('Liste des photos', 'Screen reader text for the items list heading on the post type listing screen. Added in 4.4', 'nathalie-mota'),
  );

  // Args for the Post Type
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'photo'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-camera',
    'supports'           => array('title', 'thumbnail', 'custom-fields'),
    'show_in_rest'       => false, // no Gutenberg please!
  );

  // Register the post type
  register_post_type('photo', $args);
}
add_action('init', 'create_photo_post_type');
