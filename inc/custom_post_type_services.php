<?php

// Register Custom Post Type
function custom_post_type_service() {

    $labels = array(
        'name'                  => 'Услуги',
        'singular_name'         => 'Услуга',
        'menu_name'             => 'Услуги',
        'name_admin_bar'        => 'Услуги',
        'all_items'             => 'Все услуги',
        'add_new_item'          => 'Добавить новую',
        'add_new'               => 'Добавить новую',
        'new_item'              => 'Новая',
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
        'slug'                  => 'services',
        'with_front'            => true,
        'pages'                 => false,
        'feeds'                 => false,
    );
    $args = array(
        'label'                 => 'Услуга',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'query_var'             => 'services',
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'garden_service', $args );

}
add_action( 'init', 'custom_post_type_service', 0 );