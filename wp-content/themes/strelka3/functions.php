<?php

// HEADER IMAGE
function custom_theme_features()
{
    $header_args = array(
        'default-image' => '',
        'width' => 1150,
        'height' => 150,
        'flex-width' => false,
        'flex-height' => false,
        'uploads' => true,
        'random-default' => false,
        'header-text' => false,
        'default-text-color' => '',
        'wp-head-callback' => '',
        'admin-head-callback' => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-header', $header_args);
}

add_action('after_setup_theme', 'custom_theme_features');

// MENU
add_action('init', 'register_my_menus');

function register_my_menus()
{
    register_nav_menus(
        array(
            'menu-index' => __('Středisko'),
            'menu-1' => __('Benjamínci'),
            'menu-2' => __('Světlušky'),
            'menu-3' => __('Vlčata'),
            'menu-4' => __('Skautky'),
            'menu-5' => __('Skauti'),
            'menu-6' => __('Roveři'),
        )
    );
}


// SIDEBAR
register_sidebar(array(
    'name' => __('title-sidebar'),
    'id' => 'title-sidebar',
    'description' => '',
    'class' => 'sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="content-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'name' => __('footer-sidebar'),
    'id' => 'footer-sidebar',
    'description' => '',
    'class' => 'sidebar',
    'before_widget' => '<span class="footer-content">',
    'after_widget' => '</span>',
    'before_title' => '<h2 class="hidden">',
    'after_title' => '</h2>'));



// POST THUMBNAILS
add_theme_support('post-thumbnails');

//POST EXCERPT MORE
function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Pokračovat ve čtení...', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

?>