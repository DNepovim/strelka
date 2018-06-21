<?php
$parent = array_reverse(get_post_ancestors($post->ID));
    $first_parent = get_page($parent[0]);
    $page = $first_parent->post_name;

foreach((get_the_category()) as $childcat) {
    $parentcat = $childcat->category_parent;
    $category = get_cat_name($parentcat);
}



if ( $page == 'benjaminci'  || $category == 'benjaminci' ):          dynamic_sidebar('sidebar-benjaminci');
elseif ( $page == 'svetlusky' || $category == 'svetlusky'  ):        dynamic_sidebar('sidebar-svetlusky');
elseif ( $page == 'vlcata-2' || $category == 'vlcata' ):             dynamic_sidebar('sidebar-vlcata');
elseif ( $page == 'skautky' || $category == 'skautky' ):             dynamic_sidebar('sidebar-skautky');
elseif ( $page == 'skauti' || $category == 'skauti' ):               dynamic_sidebar('sidebar-skauti');
elseif ( $page == 'roveri' || $category == 'roveri' ):               dynamic_sidebar('sidebar-roveri');
else:                                                           dynamic_sidebar('title-sidebar');
endif
?>