<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-parent',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'astra-child',
        get_stylesheet_uri(),
        ['astra-parent']
    );
});

// Save ACF field groups to theme
add_filter('acf/settings/save_json', function($path) {
    return get_stylesheet_directory() . '/acf-json';
});

// Load ACF field groups from theme
add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]); // remove default
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

// --------------------------------------------
// Custom Event Settings (Your Code)
// --------------------------------------------

// Disable Gutenberg for Event post type
add_filter('use_block_editor_for_post_type', function($use, $post_type) {
    if ($post_type === 'event') {
        return false;
    }
    return $use;
}, 10, 2);

// Remove editor support
add_action('init', function() {
    remove_post_type_support('event', 'editor');
});

add_action('acf/save_post', function($post_id) {

    // Only for event post type
    if (get_post_type($post_id) !== 'event') return;

    // Get ACF field
    $title = get_field('event_title', $post_id);

    if ($title) {
        wp_update_post([
            'ID' => $post_id,
            'post_title' => $title,
            'post_status' => 'publish'
        ]);
    }

}, 20);