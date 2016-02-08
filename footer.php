</div>
<div class="footer">
        <div class="footer-wrapper">
            <?php if ( is_active_sidebar( 'footerad' ) ) { ?>
                <div class="footerad-wrapper">
                <?php dynamic_sidebar( 'footerad' ); ?>
                </div>
            <?php } ?>
            <div class="delimiter"></div>
            <?php if ( is_active_sidebar( 'footer' ) ) { ?>
                <?php dynamic_sidebar( 'footer' ); ?>
            <?php } ?>
        </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>