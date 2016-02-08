<?php get_header(); ?>
<div id="content">
    <div id="main" class="<?php nomad_main_classes(); ?>" role="main">

            <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
            
            <?php nomad_display_post(false); ?>
            
            <?php comments_template('',true); ?>
            
            <?php endwhile; ?>
            
            <?php if (get_next_post() || get_previous_post()) { ?>
            <nav class="block">
                    <ul class="pager pager-unspaced">
                            <li class="previous"><?php previous_post_link('%link', "<i class='fa fa-arrow-left'></i> " . __( 'Previous Post', "nomad")); ?></li>
                            <li class="next"><?php next_post_link('%link', __( 'Next Post', "nomad") . " <i class='fa fa-arrow-right'></i>"); ?></li>
                    </ul>
            </nav>
            <?php } ?>
            
            <?php else : ?>
            
            <article id="post-not-found" class="block">
                <p><?php _e("No posts found.", "nomad"); ?></p>
            </article>
            
            <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
</div>
<div class="delimiter">
</div>
<?php get_footer(); ?>