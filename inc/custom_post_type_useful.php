<?php

// Register Custom Post Type
function custom_post_type_useful() {

    $labels = array(
        'name'                  => 'Полезные советы',
        'singular_name'         => 'Полезный совет',
        'menu_name'             => 'Полезные советы',
        'name_admin_bar'        => 'Полезные советы',
        'all_items'             => 'Все советы',
        'add_new_item'          => 'Добавить новый',
        'add_new'               => 'Добавить новый',
        'new_item'              => 'Новый',
        'edit_item'             => 'Редактировать',
        'update_item'           => 'Обновить',
        'view_item'             => 'Смотреть',
        'view_items'            => 'Посмотреть все',
        'not_found'             => 'Не найден',
        'not_found_in_trash'    => 'Не найден в корзине',
        'featured_image'        => 'Изображение записи',
        'set_featured_image'    => 'Установить изображение записи',
        'remove_featured_image' => 'Удалить изображение записи',
        'use_featured_image'    => 'Использовать изображение записи',
    );
    $rewrite = array(
        'slug'                  => 'useful',
        'with_front'            => true,
        'pages'                 => false,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Полезный совет',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'useful',
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'garden_useful', $args );

}
add_action( 'init', 'custom_post_type_useful', 0 );