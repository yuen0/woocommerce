<?php

// =========================================================================
// LOAD BOOTSTRAP CSS & CUSTOM MAIN.CSS
// =========================================================================
function load_css() {
    wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style( 'fullWidthImageSection', get_template_directory_uri() . '/css/full_width_image_section.css');
    wp_enqueue_style( 'blockSection', get_template_directory_uri() . '/css/block_section.css');
}
add_action('wp_enqueue_scripts', 'load_css');

// =========================================================================
// LOAD BOOTSTRAP JAVASCRIPT
// =========================================================================
function load_js() {
    wp_enqueue_script( 'bootstrap_jquery', '//code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'bootstrap_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), '1.14.7', true );
    wp_enqueue_script( 'bootstrap_javascript', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js', array(), '4.3.1', true );
}
add_action( 'wp_enqueue_scripts', 'load_js' );

// =========================================================================
// THEME OPTIONS
// =========================================================================
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// =========================================================================
// MENUS
// =========================================================================
register_nav_menus(
    array(
        'main-menu' => 'Main Menu Location',
        'store-menu' => 'Store Menu Location',
    )
);

// =========================================================================
// REGISTER WIDGETS
// =========================================================================

// REGISTER BLOG SIDEBAR

    function register_blog_sidebar() {

        register_sidebar(
            array(
                'id'            => 'blog-sidebar',
                'name'          => 'Blog Sidebar',
                'description'   => 'This widget area discription',  
                'before_widget' => '<section class="blog-sidebar-area">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )

        );
      }

    add_action( 'widgets_init', 'register_blog_sidebar' );

// REGISTER LEFT AND RIGHT SIDEBAR

    function register_all_sidebars() {

        register_sidebar(    
            array(
                'id'            => 'left-sidebar',
                'name'          => 'Left Sidebar',
                'description'   => 'This widget area discription',  
                'before_widget' => '<section class="left-sidebar-widget-container">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
        );

      }

    add_action( 'widgets_init', 'register_all_sidebars' );

// REGISTER FOOTER AREAS

    function register_footer_widget_areas() {

        register_sidebar( 
            array(
                'id'            => 'footer_area_left',
                'name'          => 'Footer Area Left',
                'description'   => 'This widget area discription',
                'before_widget' => '<section class="footer-area footer-area-left">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar( 
            array(
                'id'            => 'footer_area_center',
                'name'          => 'Footer Area Center',
                'description'   => 'This widget area discription',
                'before_widget' => '<section class="footer-area footer-area-center">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar( 
            array(
                'id'            => 'footer_area_right',
                'name'          => 'Footer Area Right',
                'description'   => 'This widget area discription',
                'before_widget' => '<section class="footer-area footer-area-right">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar( 
            array(
                'id'            => 'footer_area_bottom',
                'name'          => 'Footer Area Bottom',
                'description'   => 'This widget area discription',
                'before_widget' => '<section class="footer-area-bottom">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
        );
      }

    add_action( 'widgets_init', 'register_footer_widget_areas' );

// =========================================================================
// CHANGE EXCERPT LENGTH
// =========================================================================
function my_excerpt_length($length) {
    return 15;
}
add_filter('excerpt_length', 'my_excerpt_length');

// =========================================================================
// CUSTOM IMAGE SIZES
// =========================================================================
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 400, 300, true);
add_image_size('template-size', 500, 500, true);
add_image_size('slider-size', 1200, 700, true);