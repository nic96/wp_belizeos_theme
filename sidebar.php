<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
    <div id="sidebar-wrapper">
        <div id="sidebar">
        <?php dynamic_sidebar( 'sidebar' ); ?>
        </div>
    </div>
<?php } ?>
