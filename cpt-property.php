<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function simple_git_property_register_cpt() {
    register_post_type('property', array(
        'labels' => array(
            'name' => 'Properties',
            'singular_name' => 'Property'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'properties'),
        'supports' => array('title','editor','thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'simple_git_property_register_cpt');
