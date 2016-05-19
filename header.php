<!doctype html>  

<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" />
<script>
function navToggle() {
    document.getElementsByClassName("navbar")[0].classList.toggle("responsive");
}
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <div class="site">
    <div id="header">
        <div class="navbar">
            <a class="navbar-brand" title="<?php bloginfo('description'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php the_navbar_brand( $blog_id = 0 ); ?></a>
            <a class="nav_toggle" href="javascript:void(0);" onclick="navToggle()">&#9776;</a>
            <?php wp_nav_menu( array( 'theme_location' => 'main_nav',
            'menu' => 'main_nav', /* menu name */
            'menu_class' => 'main-nav',
            'container' => false, /* container class */
            'depth' => 2,
            ) ); ?>
            <ul class="navbar-right">
                <li>
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <input size="15" type="text" role="search" method="get" id="searchform" class="searchform form-control" placeholder="Search" action="<?php echo esc_url( home_url( '/' ) ); ?>" name="s" value="<?php echo get_search_query(); ?>"/>
                            <button class="btn-dark" type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div id="wrapper">
