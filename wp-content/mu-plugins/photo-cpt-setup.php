<?php
/**
 * Plugin Name: Photo CPT, Taxonomies and Custom Fields Setup
 * Description: Handles custom post types and taxonomies for Photos.
 * Version: 1.0
 * Author: Your Name
 */

define('POST_TYPE_SLUG', 'photo');
define("__CPT_DIR__", __DIR__ . '/photo-cpt');

// ATTENTION : l'ordre des appels est important
//
// Custom Post Type setup
require_once __CPT_DIR__ . '/photo-cpt.php';


