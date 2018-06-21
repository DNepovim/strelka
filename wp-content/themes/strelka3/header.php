<!DOCTYPE html>
<?php $options = get_option('basic'); ?>
<!-- BEGIN html -->
<html <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>;
        charset=<?php bloginfo('charset'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"
          type="text/css" media="screen"/>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();
    $parent = array_reverse(get_post_ancestors($post->ID));
    $first_parent = get_page($parent[0]);
    $page = $first_parent->post_name;

    foreach ((get_the_category()) as $childcat) {
        $parentcat = $childcat->category_parent;
        $category = get_cat_name($parentcat);
    }

    if ($page == 'benjaminci' || $category == 'benjaminci'):          echo '/style/style-1.css';
    elseif ($page == 'svetlusky' || $category == 'svetlusky'):        echo '/style/style-2.css';
    elseif ($page == 'vlcata-2' || $category == 'vlcata'):             echo '/style/style-3.css';
    elseif ($page == 'skautky' || $category == 'skautky'):             echo '/style/style-4.css';
    elseif ($page == 'skauti' || $category == 'skauti'):               echo '/style/style-3.css';
    elseif ($page == 'roveri' || $category == 'roveri'):               echo '/style/style-6.css';
    endif
    ?>"
          type="text/css" media="screen"/>


    <!-- END head -->

    <?php wp_head(); ?>

