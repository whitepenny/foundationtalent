<?php

// BP - Moved from placements plugin - 9/28/18

function ts_init_placements() {
  register_post_type( 'placement', array(
    'labels'            => array(
      'name'            => 'Placements',
      'singular_name'   => 'Placement',
     ),
    'description'       => 'Placements of Applicants.',
    'has_archive'       => true,
    'public'            => true,
    'menu_position'     => 20,
    'supports'          => array( 'title', 'editor', 'thumbnail' ),
    'show_in_nav_menus' => true,
    'capability_type'   => 'post',
    'show_in_rest'      => true,
    'taxonomies'        => array( 'placement'),
  ));

  register_taxonomy( 'placement_category', 'placement', array(
    'labels'            => array(
      'name'            => 'Categories',
      'add_new_item'    => 'Add New Category',
      'new_item_name'   => 'New Category',
    ),
    'show_ui'           => true,
    'show_tagcloud'     => false,
    'show_admin_column' => true,
    'show_in_nav_menus' => false,
    'hierarchical'      => true,
    'rewrite'           => array(
      'slug'            => 'placement_category'
    ),
  ) );

  register_taxonomy_for_object_type( 'placement_category', 'placement' );

  register_taxonomy( 'placement_collection', 'placement', array(
    'labels'            => array(
      'name'            => 'Collections',
      'add_new_item'    => 'Add New Collection',
      'new_item_name'   => 'New Collection',
    ),
    'show_ui'           => true,
    'show_tagcloud'     => false,
    'show_admin_column' => true,
    'show_in_nav_menus' => false,
    'hierarchical'      => true,
    'rewrite'           => array(
      'slug'            => 'placement_collection'
    ),
  ) );

  register_taxonomy_for_object_type( 'placement_category', 'placement' );

  // $update_taxonomy = 'placement_category';
  // $get_terms_args = array(
  //   'taxonomy' => $update_taxonomy,
  //   'fields' => 'ids',
  //   'hide_empty' => false,
  // );
  //
  // $update_terms = get_terms( $get_terms_args );
  // wp_update_term_count_now( $update_terms, $update_taxonomy );
}
add_action( 'init', 'ts_init_placements', 0 );

function ts_terms_checklist_args( $args ) {
  if ( $args['taxonomy'] == 'placement_category' ) {
    $args['checked_ontop'] = false;
  }
  return $args;
}
add_filter( 'wp_terms_checklist_args', 'ts_terms_checklist_args' );

function ts_admin_head() {
  ?>
<style>
.categorydiv div#placement_category-all.tabs-panel {
  max-height: none;
}
</style>
  <?php
}
add_action( 'admin_head', 'ts_admin_head' );

// Collection category select

function ts_populate_placement_filter_category_select( $field ) {
  $field['choices'] = array();

  $terms = get_terms( array(
    'taxonomy' => 'placement_category',
    'parent' => 0,
    'hide_empty' => false
  ) );

  foreach ( $terms as $term ) {
    $field['choices'][ $term->term_id ] = $term->name;
  }

  return $field;
}
add_filter('acf/load_field/name=placement_filter_category_select', 'ts_populate_placement_filter_category_select');

// Save terms as classes

function ts_get_placement_classes( $post_id ) {
  $term_classes = get_post_meta( $post_id, '_term_classes', true );

  if ( empty( $term_classes ) ) {
    $terms = wp_get_post_terms( $post_id, 'placement_category', array( 'fields' => 'slugs' ) );
    $term_classes = implode( ' ', $terms );

    update_post_meta( $post_id, '_term_classes', $term_classes );
  }

  return $term_classes;
}

function ts_placements_save_post( $post_id, $post, $update ) {
  ts_get_placement_classes( $term_classes );
}
add_action( 'save_post', 'ts_placements_save_post', 999, 3 );

// Get count by collection and category

function ts_placements_get_collection_category_count( $collection, $category ) {
  // $query = new WP_Query( array(
  //   'post_type' => 'placement',
  //   'posts_per_page' => -1,
  //   'tax_query' => array(
  //     'relation' => 'AND',
  //     array(
  //       'taxonomy' => 'placement_collection',
  //       'field' => 'term_id',
  //       'terms' => array( $collection->term_id ),
  //     ),
  //     array(
  //       'taxonomy' => 'placement_category',
  //       'field' => 'term_id',
  //       'terms' => array( $category->term_id ),
  //     ),
  //   ),
  // ) );
  // return $query->post_count;

  $sql = "SELECT wp_posts.ID, wp_posts.post_type, wp_posts.post_status FROM wp_posts
  LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
  LEFT JOIN wp_term_relationships AS tt1 ON (wp_posts.ID = tt1.object_id)
  WHERE 1=1
  AND ( wp_term_relationships.term_taxonomy_id IN (" . $collection->term_id . ") AND tt1.term_taxonomy_id IN (" . $category->term_id . ") )
  AND wp_posts.post_type = 'placement' AND wp_posts.post_status = 'publish'
  GROUP BY wp_posts.ID";

  global $wpdb;
  $results = $wpdb->get_results( $sql );

  return count($results);
}

// Modify query to show all

function ts_pre_get_posts( $query ) {
  if ( $query->is_main_query() && ! is_admin() ) {
    $query->set( 'posts_per_page', -1 );
  }

  return $query;
}
add_filter( 'pre_get_posts', 'ts_pre_get_posts' );

// Ajax loading (if needed)

function ts_ajax_placements_get_posts() {
  $collection = $_GET['placement_collection'];

  $query = query_posts( array(
    'post_type' => 'placement',
    'posts_per_page' => -1,
    'cat' => $collection,
  ) );

  get_template_part( 'template-parts/placement-loop' );

  die();
}
add_action( 'wp_ajax_placements_get_posts', 'ts_ajax_placements_get_posts' );
add_action( 'wp_ajax_nopriv_placements_get_posts', 'ts_ajax_placements_get_posts' );




// ---------------------

// LEGACY TAXONOMIES

add_action('init', 'placement_practices', 0);

function placement_practices() {
    $labels = array(
      'name'              => _x( 'Placement Practices', 'taxonomy general name' ),
      'singular_name'     => _x( 'Placement Practice', 'taxonomy singular name' ),
      'search_items'      => __( 'Show Placement Practice' ),
      'all_items'         => __( 'All Placement Practice' ),
      'parent_item'       => __( 'Parent Placement Practice' ),
      'parent_item_colon' => __( 'Parent Placement Practice' ),
      'edit_item'         => __( 'Edit Placement Practice' ),
      'update_item'       => __( 'Update Placement Practice' ),
      'add_new_item'      => __( 'Add New Placement Practice' ),
      'new_item_name'     => __( 'New Placement Practice' ),
      'menu_name'         => __( 'Placement Practice' ),
    );

  $args = array(
    'labels' => $labels,
    'public' => false,
  );

  register_taxonomy( 'placement_practice', 'placement', $args );
  register_taxonomy_for_object_type( 'placement_practice', 'placement' );
}

add_action('init', 'placement_functions', 0);

function placement_functions() {
    $labels = array(
      'name'              => _x( 'Placement Functions', 'taxonomy general name' ),
      'singular_name'     => _x( 'Placement Function', 'taxonomy singular name' ),
      'search_items'      => __( 'Show Placement Function' ),
      'all_items'         => __( 'All Placement Function' ),
      'parent_item'       => __( 'Parent Placement Function' ),
      'parent_item_colon' => __( 'Parent Placement Function' ),
      'edit_item'         => __( 'Edit Placement Function' ),
      'update_item'       => __( 'Update Placement Function' ),
      'add_new_item'      => __( 'Add New Placement Function' ),
      'new_item_name'     => __( 'New Placement Function' ),
      'menu_name'         => __( 'Placement Functions' ),
    );

  $args = array(
    'labels' => $labels,
    'public' => false,
  );

  register_taxonomy( 'placement_function', 'placement', $args );
  register_taxonomy_for_object_type( 'placement_function', 'placement' );
}

add_action('init', 'placement_assets', 0);

function placement_assets() {
    $labels = array(
      'name'              => _x( 'Placement Assets', 'taxonomy general name' ),
      'singular_name'     => _x( 'Placement Asset', 'taxonomy singular name' ),
      'search_items'      => __( 'Show Placement Asset' ),
      'all_items'         => __( 'All Placement Asset' ),
      'parent_item'       => __( 'Parent Placement Asset' ),
      'parent_item_colon' => __( 'Parent Placement Asset' ),
      'edit_item'         => __( 'Edit Placement Asset' ),
      'update_item'       => __( 'Update Placement Asset' ),
      'add_new_item'      => __( 'Add New Placement Asset' ),
      'new_item_name'     => __( 'New Placement Asset' ),
      'menu_name'         => __( 'Placement Asset' ),
    );

  $args = array(
    'labels' => $labels,
    'public' => false,
  );

  register_taxonomy( 'placement_asset', 'placement', $args );
  register_taxonomy_for_object_type( 'placement_asset', 'placement' );
}

add_action('init', 'placement_locations', 0);

function placement_locations() {
    $labels = array(
      'name'              => _x( 'Placement Locations', 'taxonomy general name' ),
      'singular_name'     => _x( 'Placement Location', 'taxonomy singular name' ),
      'search_items'      => __( 'Show Placement Location' ),
      'all_items'         => __( 'All Placement Location' ),
      'parent_item'       => __( 'Parent Placement Location' ),
      'parent_item_colon' => __( 'Parent Placement Location' ),
      'edit_item'         => __( 'Edit Placement Location' ),
      'update_item'       => __( 'Update Placement Location' ),
      'add_new_item'      => __( 'Add New Placement Location' ),
      'new_item_name'     => __( 'New Placement Location' ),
      'menu_name'         => __( 'Placement Location' ),
    );

  $args = array(
    'labels' => $labels,
    'public' => false,
  );

  register_taxonomy( 'placement_location', 'placement', $args );
  register_taxonomy_for_object_type( 'placement_location', 'placement' );
}

// add_action('init', 'placement_collection', 0);
//
// function placement_collection() {
//     $labels = array(
//       'name'              => _x( 'Placement Collections', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Collection', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Collection' ),
//       'all_items'         => __( 'All Placement Collection' ),
//       'parent_item'       => __( 'Parent Placement Collection' ),
//       'parent_item_colon' => __( 'Parent Placement Collection' ),
//       'edit_item'         => __( 'Edit Placement Collection' ),
//       'update_item'       => __( 'Update Placement Collection' ),
//       'add_new_item'      => __( 'Add New Placement Collection' ),
//       'new_item_name'     => __( 'New Placement Collection' ),
//       'menu_name'         => __( 'Placement Collection' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_collection', 'placement', $args );
//   register_taxonomy_for_object_type( 'placement_collection', 'placement' );
// }

add_action('init', 'placement_quarters', 0);

function placement_quarters() {
    $labels = array(
      'name'              => _x( 'Placement Quarters', 'taxonomy general name' ),
      'singular_name'     => _x( 'Placement Quarter', 'taxonomy singular name' ),
      'search_items'      => __( 'Show Placement Quarters' ),
      'all_items'         => __( 'All Placement Quarters' ),
      'parent_item'       => __( 'Parent Placement Quarter' ),
      'parent_item_colon' => __( 'Parent Placement Quarter' ),
      'edit_item'         => __( 'Edit Placement Quarter' ),
      'update_item'       => __( 'Update Placement Quarter' ),
      'add_new_item'      => __( 'Add New Placement Quarter' ),
      'new_item_name'     => __( 'New Placement Quarter' ),
      'menu_name'         => __( 'Placement Quarters' ),
    );

  $args = array(
    'labels' => $labels,
    'public' => false,
  );

  register_taxonomy( 'placement_quarters', 'placement', $args );
  register_taxonomy_for_object_type( 'placement_quarters', 'placement' );
}
