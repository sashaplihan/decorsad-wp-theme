<?php

// Register Custom Post Type
function custom_post_type_seedlings() {

    $labels = array(
        'name'                  => 'Каталог сортов',
        'singular_name'         => 'Сорт',
        'menu_name'             => 'Сорта',
        'add_new_item'          => 'Добавить новый сорт',
        'add_new'               => 'Добавить новый',
        'new_item'              => 'Новый элемент',
        'edit_item'             => 'Редактировать элемент',
        'update_item'           => 'Обновить элемент',
        'view_item'             => 'Просмотреть элемент',
        'view_items'            => 'Просмотреть всё',
    );
    $rewrite = array(
        'slug'                  => 'seedlings',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Seedling',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-palmtree',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'query_var'             => 'seedlings',
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'garden_seedlings', $args );


    $labels = array(
        'name'					=> 'Рубрики сортов',
        'singular_name'			=> 'Рубрика',
        'menu_name'				=> 'Рубрики сортов',
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(),
    );

    register_taxonomy( 'seedlings', array( 'garden_seedlings' ), $args );

}
add_action( 'init', 'custom_post_type_seedlings', 0 );