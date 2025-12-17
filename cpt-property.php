<?php
// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Property CPT
 */
function simple_git_property_register_cpt() {

    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'name_admin_bar'     => 'Property',
        'add_new_item'       => 'Add New Property',
        'edit_item'          => 'Edit Property',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'properties' ),
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'property', $args );
}
add_action( 'init', 'simple_git_property_register_cpt' );
