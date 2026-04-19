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