<?php
// Declaration of theme supported features
function belizeos_theme_support() {
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    add_theme_support( 'custom-logo', array(
        'height'      => 46,
        'width'       => 400,
        'flex-width' => true,
    ) );
    add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size(125, 125, true);   // default thumb size
    add_theme_support('automatic-feed-links'); // rss thingy
    add_theme_support('custom-background', array(
        'default-color' => '#e8e8e8',
    ));
    add_theme_support( 'title-tag' );
    register_nav_menus(                      // wp3+ menus
        array( 
            'main_nav' => __('Main Menu', 'belizeos'),   // main nav in header
        )
    );
    add_image_size( 'belizeos_featured', 150, 150, true);
    load_theme_textdomain( 'belizeos', get_template_directory() . '/languages' );
    add_editor_style( array( 'css/editor-style.css', 'css/font-awesome.min.css' ) );
}
add_action('after_setup_theme','belizeos_theme_support');

function belizeos_customize_register( $wp_customize ) {
   $wp_customize->add_setting( 'header_color' , array(
        'default'     => '#3f3f3f',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
        'label'        => __( 'Header Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'header_color',
    ) ) );
    $wp_customize->add_setting( 'header_text_color' , array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'label'        => __( 'Header Text Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'header_text_color',
    ) ) );
    $wp_customize->add_setting( 'block_background_color' , array(
        'default'     => '#fbfbfb',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'block_background_color', array(
        'label'        => __( 'Blocks Background Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'block_background_color',
    ) ) );
    $wp_customize->add_setting( 'block_text_color' , array(
        'default'     => '#000000',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'block_text_color', array(
        'label'        => __( 'Blocks Text Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'block_text_color',
    ) ) );
    $wp_customize->add_setting( 'footer_background_color' , array(
        'default'     => '#dadada',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label'        => __( 'Footer Background Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'footer_background_color',
    ) ) );
    $wp_customize->add_setting( 'footer_text_color' , array(
        'default'     => '#505050',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'label'        => __( 'Footer Text Color', 'belizeos' ),
        'section'    => 'colors',
        'settings'   => 'footer_text_color',
    ) ) );
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}
add_action( 'customize_register', 'belizeos_customize_register' );

function belizeos_customize_css()
{
    ?>
        <style type="text/css">
            #header {
                background-color:<?php echo get_theme_mod('header_color', '#333'); ?>;
            }
            .navbar-brand, .navbar li a {
                color:<?php echo get_theme_mod('header_text_color', '#fff'); ?>;
            }
            .block, #sidebar-wrapper {
                color:<?php echo get_theme_mod('block_text_color', '#000000'); ?>;
                background-color:<?php echo get_theme_mod('block_background_color', '#fbfbfb'); ?>;
            }
            #sidebar .widget ul a {
                color: #333;
            }
            #sidebar .widget ul a:hover {
                color: #1e73be;
            }
            .footer .widget a {
                color: #00067d;
            }
            .footer .widget a:hover {
                color: #1e73be;
            }
            .footer {
                color:<?php echo get_theme_mod('footer_text_color', '#505050'); ?>;
                background-color:<?php echo get_theme_mod('footer_background_color', '#dadada'); ?>;
            }
        </style>
    <?php
}
add_action( 'wp_head', 'belizeos_customize_css');

function belizeos_customizer_live_preview()
{
    wp_enqueue_script( 
        'belizeos-themecustomizer',                //Give the script an ID
        get_template_directory_uri().'/js/theme-customizer.js',//Point to file
        array( 'jquery','customize-preview' ),  //Define dependencies
        '',                                     //Define a version (optional) 
        true                                    //Put script in footer?
    );
}
add_action( 'customize_preview_init', 'belizeos_customizer_live_preview' );

// Sidebar and Footer declaration
function belizeos_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => __('Sidebar', 'belizeos'),
        'description' => __('Used on every page.', 'belizeos'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
      'id' => 'footer',
      'name' => __('Footer', 'belizeos'),
      'description' => __('Used on every page.', 'belizeos'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
      'id' => 'footerad',
      'name' => __('Footer Ad', 'belizeos'),
      'description' => __('Useful for Google ads. Used on every page.', 'belizeos'),
      'before_widget' => '<div id="%1$s" class="widget footerad %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
}
add_action( 'widgets_init', 'belizeos_register_sidebars' );

function belizeos_page_navi() {
    global $wp_query;
    ?>

    <?php if (get_next_posts_link() or get_previous_posts_link()) { ?>
        <nav class="block">
            <ul class="pager pager-unspaced">
                <li class="previous"><?php next_posts_link(__('Older posts', "belizeos") . " <i class='fa fa-arrow-right'></i>"); ?></li>
                <li class="next"><?php previous_posts_link("<i class='fa fa-arrow-left'></i> " . __('Newer posts', "belizeos")); ?></li>
            </ul>
        </nav>
    <?php } ?>

    <?php
}

function belizeos_display_post($multiple_on_page) { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class("block"); ?> role="article">
        
        <header>
            
            <?php if ($multiple_on_page) : ?>
            <div class="article-header">
                <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <small><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?> | <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                <?php if(get_the_category_list()) { if(count(get_the_category_list()) > 1) { ?>| Categories <i class="fa fa-sitemap"></i>
                <?php }else{ ?>| Category <i class="fa fa-sitemap"></i> <?php } echo get_the_category_list( ", " ); ?><?php }
                echo ' | <i class="fa fa-comment"></i> ';
                comments_popup_link( 'No comments', '1 comment', '% comments' );
            ?></small>
            </div>
            <?php else: ?>
            <div class="article-header">
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if(!is_page()){ ?><small><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?> | <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                <?php if(get_the_category_list()) { if(count(get_the_category_list()) > 1) { ?>| Categories <i class="fa fa-sitemap"></i>
                <?php }else{ ?>| Category <i class="fa fa-sitemap"></i> <?php } echo get_the_category_list( ", " ); ?><?php } ?>
                <?php
                    echo ' | <i class="fa fa-comment"></i> ';
                    comments_popup_link( 'No comments', '1 comment', '% comments' );
                ?></small><?php } ?>
            </div>
            <?php endif ?>
        
        </header>
        <section class="post_content">
        <?php if (has_post_thumbnail()) { ?>
                <?php if ($multiple_on_page) : ?>
                <a href="<?php the_permalink() ?>" class="featured-image" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('belizeos_featured'); ?></a>
                <?php endif ?>
        <?php } ?>
            <?php
            if ($multiple_on_page) {
                the_excerpt();
            } else {
                the_content();
                wp_link_pages();
            }
            ?>
        </section>
        
        <footer>
            <?php the_tags('<small class="tags"><i class="fa fa-tags"></i> Taged as: ', ', ', '</small>'); ?>
        </footer>
    
    </article>

<?php }

function get_navbar_brand( $blog_id = 0 ){
    $html = '';
    if ( function_exists( 'the_custom_logo' ) ) {
        if(has_custom_logo( $blog_id = 0 )) {
            if ( is_multisite() && (int) $blog_id !== get_current_blog_id() ) {
                switch_to_blog( $blog_id );
            }
        
            $custom_logo_id = get_theme_mod( 'custom_logo' );
        
            // We have a logo. Logo is go.
            if ( $custom_logo_id ) {
                $html = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                    'class'    => 'custom-logo',
                    'itemprop' => 'logo',
                ));
            }
        
            // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
            elseif ( is_customize_preview() ) {
                $html = '<img class="custom-logo"/>';
            }
        
            if ( is_multisite() && ms_is_switched() ) {
                restore_current_blog();
            }
        
            /**
            * Filter the custom logo output.
            *
            * @since 4.5.0
            *
            * @param string $html Custom logo HTML output.
            */
        }else{
            $html = bloginfo('name');
        }
    }else{
        $html = bloginfo('name');
    }
    return apply_filters( 'get_navbar_brand', $html );
}

function the_navbar_brand( $blog_id = 0){
    echo get_navbar_brand( $blog_id );
}

function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article &rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function belizeos_main_classes() {
    if ( !is_active_sidebar( 'sidebar' ) ){
        $classes="main-full";
    } else {
        $classes="main";
    }
    echo $classes;
}
?>
