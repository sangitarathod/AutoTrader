<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function at_add_normalize_CSS()
{
    wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
add_action('wp_enqueue_scripts', 'at_add_normalize_CSS');

// Register a new sidebar simply named 'sidebar'
function at_add_widget_support()
{
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );
}
// Hook the widget initiation and run our function
add_action('widgets_init', 'at_add_widget_support');

// Register a new navigation menu
function at_add_Main_Nav()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
// Hook to the init action hook, run our navigation menu function
add_action('init', 'at_add_Main_Nav');


function at_theme_support_options()
{
    $defaults = array(
        'height' => 150,
        'width' => 250,
        'flex-height' => false,
        // <-- setting both flex-height and flex-width to false maintains an aspect ratio
        'flex-width' => false
    );
    add_theme_support('custom-logo', $defaults, );
    add_theme_support('post-thumbnails');

}
// call the function in the hook
add_action('after_setup_theme', 'at_theme_support_options');