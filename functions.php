<?php
/**
 * Cardening functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cardening
 */

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_show_pages', '__return_true' );

function theme_options_parent($parent ) {
    $parent = '';
    return $parent;
}
add_filter( 'ot_theme_options_parent_slug', 'theme_options_parent',20 );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'functions/theme-options.php' );
require( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php' );

function garden_setup() {

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Главное меню', 'garden' ),
        'side_menu' => esc_html__( 'Боковое меню', 'garden' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Регистрируем дополнительный размер миниатюры:
    add_image_size( 'service_thumb', 255, 230, true );
    add_image_size( 'sort_thumb', 390, 350, true );
    add_image_size( 'pop_thumb', 270, 300, true );


    require get_template_directory() . '/inc/custom_post_type_useful.php';
    require get_template_directory() . '/inc/custom_post_type_services.php';
    require get_template_directory() . '/inc/custom_post_type_catalog.php';

    // Breadcrumbs for this theme.
    require get_template_directory() . '/inc/breadcrumbs-functions.php';
}
add_action( 'after_setup_theme', 'garden_setup' );


/* Обновляет ссылки для произвольных типов записей */
function garden_reset_permalink() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'garden_reset_permalink' );


function garden_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'garden' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Добавьте виджет сюда.', 'garden' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    /**
     *  Правый сайдбар для футера
     */
    register_sidebar( array(
        'name'          => esc_html__( 'footer_right_sidebar', 'garden' ),
        'id'            => 'sidebar_footer_right',
        'description'   => 'Добавьте виджет сюда.',
        'before_widget' => '<div class="footer_left">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ) );
}
add_action( 'widgets_init', 'garden_widgets_init' );

/* Change active class menu */
function trucking_filter_active_class_menu( $classes){
    if(in_array('current-menu-item', $classes)) {
        $classes[] =  'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'trucking_filter_active_class_menu', 10, 4 );


function garden_style() {

    wp_enqueue_style( 'garden-bootstrap', get_template_directory_uri() .'/libs/bootstrap-4.0/css/bootstrap.min.css' );

    wp_enqueue_style( 'garden-style', get_stylesheet_uri() );

    wp_enqueue_style( 'garden-awesome', get_template_directory_uri() .'/libs/font-awesome/css/font-awesome.min.css');

    wp_enqueue_style( 'garden-owl-carousel', get_template_directory_uri() .'/libs/owl_carousel/dist/assets/owl.carousel.css');

    wp_enqueue_style( 'garden-owl-carousel-default', get_template_directory_uri() .'/libs/owl_carousel/dist/assets/owl.theme.default.css');

    wp_enqueue_style( 'garden-fonts', get_template_directory_uri() . '/css/fonts.css');

    wp_enqueue_style( 'garden-media', get_template_directory_uri() . '/css/media.css');
}
add_action( 'wp_enqueue_scripts', 'garden_style' );

function garden_scripts() {
    wp_enqueue_script( 'garden-script-bootstrap', get_template_directory_uri() . '/libs/bootstrap-4.0/js/bootstrap.min.js', array('jquery'), '', true);

    wp_enqueue_script( 'garden-owl-carousel', get_template_directory_uri() . '/libs/owl_carousel/dist/owl.carousel.min.js', array('jquery'), '', true);

    if(is_page_template('contact-page.php')) {

        wp_enqueue_script( 'garden-api-map', 'https://api-maps.yandex.ru/2.1/?apikey=<e046cb2e-3517-4b94-99a6-913d43f7289e>&lang=ru_RU', array(), '', true );

        wp_enqueue_script( 'garden-map', get_template_directory_uri() . '/js/map.js', array(), '', true );

    }

    wp_enqueue_script( 'garden-cammon', get_template_directory_uri() . '/js/common.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'garden_scripts' );


//require get_template_directory() . '/inc/custom-header.php';

//require get_template_directory() . '/inc/template-tags.php';

//require get_template_directory() . '/inc/template-functions.php';

//require get_template_directory() . '/inc/customizer.php';

//if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}

