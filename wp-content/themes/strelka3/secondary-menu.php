<?php
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_page($parent[0]);
$page = $first_parent->post_name;

foreach ((get_the_category()) as $childcat) {
    $parentcat = $childcat->category_parent;
    $category = get_cat_name($parentcat);
}

if ($page == 'benjaminci' || $category == 'benjaminci') {
    if (has_nav_menu('menu-1')) {
        wp_nav_menu(array('theme_location' => 'menu-1'));
    }
} elseif ($page == 'svetlusky' || $category == 'svetlusky') {
    if (has_nav_menu('menu-2')) {
        wp_nav_menu(array('theme_location' => 'menu-2'));
    }
} elseif ($page == 'vlcata-2' || $category == 'vlcata') {
    if (has_nav_menu('menu-3')) {
        wp_nav_menu(array('theme_location' => 'menu-3'));
    }
} elseif ($page == 'skautky' || $category == 'skautky') {
    if (has_nav_menu('menu-4')) {
        wp_nav_menu(array('theme_location' => 'menu-4'));
    }
} elseif ($page == 'skauti' || $category == 'skauti') {
    if (has_nav_menu('menu-5')) {
        wp_nav_menu(array('theme_location' => 'menu-5'));
    }
} elseif ($page == 'roveri' || $category == 'roveri') {
    if (has_nav_menu('menu-6')) {
        wp_nav_menu(array('theme_location' => 'menu-6'));
    }
} else {
    if (has_nav_menu('menu-index')) {
        wp_nav_menu(array('theme_location' => 'menu-index'));
    }
}
?>