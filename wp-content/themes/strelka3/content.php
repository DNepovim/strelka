<div <?php post_class() ?> id="post-<?php the_ID(); ?>">


    <!-- title -->
    <?php if (is_single()) : ?>
        <h2 class="content-title"><?php the_title(); ?></h2>
    <?php else : ?>
        <h2 class="content-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
    <?php endif; // is_single() ?>

    <!-- thumbnail -->
    <?php
    if (is_search() || is_home() || is_archive() || is_tag() || is_category()) :?>
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium', array('class' => 'img-responsive content-thumbnail')); ?>
    <?php endif; ?>

    <!-- content -->
    <?php echo the_excerpt(); ?>
    <hr class="clear">
</div>

<?php else: ?>

    <?php the_content(__('Read more...', 'theme')); ?>
    </div>
<?php
endif;
?>
