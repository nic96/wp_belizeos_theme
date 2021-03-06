<?php get_header(); ?>
<div id="content">
    <div id="main" class="<?php belizeos_main_classes(); ?>" role="main">

            <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
            
            <?php belizeos_display_post(true); ?>
            
            <?php endwhile; ?>
            
            <?php belizeos_page_navi(); ?>
            
            <?php else : ?>
            
            <article id="post-not-found" class="block">
                <p><?php _e("No posts found.", "belizeos"); ?></p>
            </article>
            
            <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
</div>
<div class="delimiter">
</div>
<?php get_footer(); ?>
