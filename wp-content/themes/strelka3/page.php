<?php get_header(); ?>

</head>
<body>
<div class="container">
    <img class="img-responsive background-image" src="<?php echo get_stylesheet_directory_uri() ?>/img/obloha.png">

    <!-- HEADER -->
    <!-- head -->
    <a href="<?php echo home_url('/'); ?>">
        <div class="row" id="head">
            <div id="head-content">
                <div id="head-logo" class="col-md-2 col-sm-2 col-xs-4"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png">
                </div>
                <div id="head-title" class="col-md-6 col-sm-6 col-xs-8">
                    <div id="head-title-content">
                        <?php include 'head.php'; ?>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs moto"><h3>... skauting pro život</h3>

                </div>

            </div>
        </div>
    </a>
    <!-- primary menu -->
    <div class="hidden-sm hidden-xs">
        <?php
        $parent = array_reverse(get_post_ancestors($post->ID));
        $first_parent = get_page($parent[0]);
        $page = $first_parent->post_name;

        foreach ((get_the_category()) as $childcat) {
            $parentcat = $childcat->category_parent;
            $category = get_cat_name($parentcat);
        }

        if ($page != 'benjaminci' &&
            $page != 'svetlusky' &&
            $page != 'vlcata-2' &&
            $page != 'skautky' &&
            $page != 'skauti' &&
            $page != 'roveri' &&
            $category != 'benjaminci' &&
            $category != 'svetlusky' &&
            $category != 'vlcata' &&
            $category != 'skautky' &&
            $category != 'skauti' &&
            $category != 'roveri'
        ) {
            include 'buttons.php';
        } else {
            include 'primary-menu.php';
        }
        ?>
    </div>
    <div class="hidden-lg hidden-md">
        <?php include 'primary-menu.php'; ?>
    </div>
    <div class="row"></div>
    <!-- BODY -->
    <!-- secondary menu -->
    <div class="col-md-2 col-sm-2">
    <div>
        <?php include 'secondary-menu.php'; ?>
    </div>
</div>
<div class="row hidden-lg hidden-md hidden-sm"></div>
<!-- wrapper -->
<div class="col-md-10 col-sm-10">
    <div id="wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>
            <div class="navigation">
                <?php posts_nav_link('', __('<< Předchozí', 'theme'), __('Další >>', 'theme')); ?>
            </div>

        <?php else : ?>

            <div id="post-0" <?php post_class(); ?>>
                <h1 class="entry-title">
                    <?php _e('Stránka nenalezena...', 'theme') ?>
                </h1>

                <div class="entry-content">
                    <p><?php _e("Tato stránka zde není...", "theme") ?></p>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

 <?php get_footer(); ?>
