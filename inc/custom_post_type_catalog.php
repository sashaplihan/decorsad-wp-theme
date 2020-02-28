<?php

add_action( 'init', 'custom_post_type_seedlings' );
function custom_post_type_seedlings() {
// Раздел сортов - catalog
register_taxonomy('catalog', array('seedling'), array(
'label'                 => 'Раздел сорта', // определяется параметром $labels->name
'labels'                => array(
'name'              => 'Категории сортов',
'singular_name'     => 'Категория сорта',
'search_items'      => 'Искать категорию сорта',
'all_items'         => 'Все категории',
'parent_item'       => 'Родит. категория сорта',
'parent_item_colon' => 'Родит. категория сорта:',
'edit_item'         => 'Редактировать категорию сорта',
'update_item'       => 'Обновить категорию сорта',
'add_new_item'      => 'Добавить категорию сорта',
'new_item_name'     => 'Новая категория сорта',
'menu_name'         => 'Категория сорта',
),
'description'           => 'Рубрики для раздела сортов', // описание таксономии
'public'                => true,
'show_in_nav_menus'     => true, // равен аргументу public
'show_ui'               => true, // равен аргументу public
'show_tagcloud'         => false, // равен аргументу show_ui
'hierarchical'          => true,
'sort' => true,
'args' => array( 'orderby' => 'term_order' ),
'rewrite'               => array('slug'=>'seedling', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
) );

// тип записи - Каталог сортов - seedling
register_post_type('seedling', array(
'label'               => 'Сорт',
'labels'              => array(
'name'          => 'Каталог сортов',
'singular_name' => 'Сорт',
'menu_name'     => 'Сорта',
'all_items'     => 'Все сорта',
'add_new'       => 'Добавить сорт',
'add_new_item'  => 'Добавить новый сорт',
'edit'          => 'Редактировать',
'edit_item'     => 'Редактировать сорт',
'new_item'      => 'Новый сорт',
'featured_image'        => 'Изображение записи',
'set_featured_image'    => 'Установить изображение записи',
'remove_featured_image' => 'Удалить изображение записи',
'use_featured_image'    => 'Использовать изображение записи',
),
'description'         => '',
'public'              => true,
'publicly_queryable'  => true,
'show_ui'             => true,
'show_in_rest'        => false,
'rest_base'           => '',
'show_in_menu'          => true,
'menu_position'         => 7,
'menu_icon'             => 'dashicons-palmtree',
'exclude_from_search' => false,
'capability_type'     => 'post',
'map_meta_cap'        => true,
'hierarchical'        => false,
'rewrite'             => array( 'slug'=>'seedling/%catalog%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
'has_archive'         => 'seedling',
'query_var'           => true,
'supports'            => array( 'title', 'editor', 'thumbnail' ),
'taxonomies'          => array( 'catalog' ),
) );

}

## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'faq_permalink', 1, 2);
function faq_permalink( $permalink, $post ){
    // выходим если это не наш тип записи: без холдера %products%
    if( strpos($permalink, '%catalog%') === false )
        return $permalink;

    // Получаем элементы таксы
    $terms = get_the_terms($post, 'catalog');
    // если есть элемент заменим холдер
    if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
        $term_slug = array_pop($terms)->slug;
    // элемента нет, а должен быть...
    else
        $term_slug = 'no-catalog';

    return str_replace('%catalog%', $term_slug, $permalink );
}