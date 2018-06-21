<?php
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_page($parent[0]);
$page = $first_parent->post_name;

foreach ((get_the_category()) as $childcat) {
    $parentcat = $childcat->category_parent;
    $category = get_cat_name($parentcat);
}

if ($page == 'benjaminci' || $category == 'benjaminci') {
    echo '<h2>6. oddíl</h2>';
    echo '<h1>Benjamínci</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} elseif ($page == 'svetlusky' || $category == 'svetlusky') {
    echo '<h2>3. roj světlušek</h2>';
    echo '<h1>Waliča Teča</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} elseif ($page == 'vlcata-2' || $category == 'vlcata') {
    echo '<h2>1. smečka vlčat</h2>';
    echo '<h1>Stopaři</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} elseif ($page == 'skautky' || $category == 'skautky') {
    echo '<h2>5. oddíl skautek</h2>';
    echo '<h1>Kvítka</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} elseif ($page == 'skauti' || $category == 'skauti') {
    echo '<h2>1. oddíl skautů</h2>';
    echo '<h1>Stopaři</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} elseif ($page == 'roveri' || $category == 'roveri') {
    echo '<h2>2. roverský kmen</h2>';
    echo '<h1>Sus Scrofa</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
} else {
    echo '<h2>středisko</h2>';
    echo '<h1>';
    bloginfo("title");
    echo '</h1>';
    echo '<h2>';
    bloginfo("description");
    echo '</h2>';
}
?>
