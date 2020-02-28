<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {

    $main_page = array(
        'id'       => 'main_page_box',
        'title'    => 'Настройки главной страницы',
        'desc'     => '',
        'pages'    => array( 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label' => 'Слайдер главной страницы',
                'id'    => 'main_slider_tab',
                'type'  => 'tab',
            ),
            array(
                'label' => 'Показывать секцию со слайдером',
                'id'    => 'main_slider_show',
                'type'  => 'on-off',
                'desc'  => 'Показывать или нет секцию со слайдером на главной странице',
                'std'   => 'off',
            ),
            array(
                'id'           => 'main_slider_list',
                'label'        => 'Слайдер главной страницы',
                'desc'         => '',
                'std'          => '',
                'type'         => 'list-item',
                'condition'    => 'main_slider_show:is(on)',
                'settings'     => array(
                    array(
                        'id'           => 'slider_upload',
                        'label'        => 'Картинка для слайда',
                        'desc'         => 'Загрузите картинку для слайда',
                        'type'         => 'upload',
                    ),
                    array(
                        'id'           => 'slider_title',
                        'label'        => 'Заглавие для слайда',
                        'desc'         => 'Введите заглавие для слайда',
                        'type'         => 'text',
                    ),
                    array(
                        'id'           => 'slider_description',
                        'label'        => 'Описание для слайда',
                        'desc'         => 'Введите описание для слайда',
                        'type'         => 'text',
                    ),
                )
            ),
            array(
                'label' => 'Секция о компании',
                'id'    => 'about_tab',
                'type'  => 'tab',
            ),
            array(
                'label' => 'Показывать секцию о продаже саженцев',
                'id'    => 'about_show',
                'type'  => 'on-off',
                'desc'  => 'Показывать или нет секцию о компании',
                'std'   => 'off',
            ),
            array(
                'id'          => 'about_title',
                'label'       => 'Заглавие для секции о компании',
                'desc'        => 'Введите заглавие секции о компании',
                'type'        => 'text',
                'condition'   => 'about_show:is(on)',
            ),
            array(
                'label' => 'Секция о продаже саженцев',
                'id'    => 'sale_tab',
                'type'  => 'tab',
            ),
            array(
                'label' => 'Показывать секцию о продаже саженцев',
                'id'    => 'sale_show',
                'type'  => 'on-off',
                'desc'  => 'Показывать или нет секцию о продаже саженцев',
                'std'   => 'off',
            ),
            array(
                'id'          => 'sale_title',
                'label'       => 'Заглавие для секции о продаже саженцев',
                'desc'        => 'Введите заглавие секции о продаже саженцев',
                'type'        => 'text',
                'condition'   => 'sale_show:is(on)',
            ),
            array(
                'id'           => 'sale_list_item',
                'label'        => 'Кнопки секции о продаже саженцев',
                'desc'         => '',
                'std'          => '',
                'type'         => 'list-item',
                'condition'    => 'sale_show:is(on)',
                'settings'     => array(
                    array(
                        'id'           => 'title_button_sale',
                        'label'        => 'Название кнопки',
                        'desc'         => 'Введите название кнопки',
                        'type'         => 'text',
                    ),
                    array(
                        'id'           => 'link_button_sale',
                        'label'        => 'Ссылка для кнопки',
                        'desc'         => 'Введите ссылку для кнопки',
                        'type'         => 'text',
                    ),
                )
            ),

            array(
                'label' => 'Секция популярных продуктов',
                'id'    => 'top_product_tab',
                'type'  => 'tab',
            ),
            array(
                'label' => 'Показывать секцию популярных продуктов',
                'id'    => 'top_product_show',
                'type'  => 'on-off',
                'desc'  => 'Показывать или нет секцию популярных продуктов',
                'std'   => 'off',
            ),
            array(
                'id'          => 'top_product_title',
                'label'       => 'Заглавие для секции популярных продуктов',
                'desc'        => 'Введите заглавие секции популярных продуктов',
                'type'        => 'text',
                'condition'   => 'top_product_show:is(on)',
            ),
            array(
                'id'           => 'top_product_list_item',
                'label'        => 'Популярные продукты',
                'desc'         => '',
                'std'          => '',
                'type'         => 'list-item',
                'condition'    => 'top_product_show:is(on)',
                'settings'     => array(
                    array(
                        'id'          => 'main_top_product_list',
                        'label'       => 'Популярные продукты',
                        'desc'        => 'Выберите популярные продукты',
                        'type'        => 'custom-post-type-select',
                        'post_type'   => 'seedling',
                    ),
                )
            ),
            array(
                'id'           => 'title_button_top',
                'label'        => 'Название кнопки для популярных продуктов',
                'desc'         => 'Введите название кнопки для популярных продуктов',
                'type'         => 'text',
            ),
            array(
                'id'           => 'link_button_top',
                'label'        => 'Ссылка для кнопки популярных продуктов',
                'desc'         => 'Введите ссылку для кнопки популярных продуктов',
                'type'         => 'text',
            ),
        ),
    );

    $meta_box_contact = array(
        'id'          => 'contact_meta_box',
        'title'       => 'Настройки страницы Контакты',
        'desc'        => '',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Шорткод формы обратной связи',
                'id'          => 'shortcode_contact_form_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Показать  форму обратной связи?',
                'id'          => 'contact_form_show',
                'type'        => 'on-off',
                'desc'        => 'Показать или скрыть форму обратной связи на стрвнице Контакты',
                'std'         => 'off'
            ),
            array(
                'label'       => 'Шорткод формы Contact form 7',
                'id'          => 'shortcode_contact_form',
                'type'        => 'text',
                'desc'        => 'Введите шорткод формы Contact form 7',
                'condition'   => 'contact_form_show:is(on)',
            ),

            array(
                'label'       => 'Контактная информация',
                'id'          => 'contact_info_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Показать контактную информацию?',
                'id'          => 'contact_info_show',
                'type'        => 'on-off',
                'desc'        => 'Показать или скрыть контактную информацию на стрвнице Контакты',
                'std'         => 'off'
            ),
            array(
                'label'       => 'Название блока контактной информации 1',
                'id'          => 'contact_page_block_name_1',
                'type'        => 'text',
                'desc'        => 'Введите название блока контактной информации 1',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'label'       => 'Содержание блока контактной информации 1',
                'id'          => 'contact_page_block_content_1',
                'type'        => 'textarea',
                'desc'        => 'Введите содержание блока контактной информации 1',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'label'       => 'Название блока контактной информации 2',
                'id'          => 'contact_page_block_name_2',
                'type'        => 'text',
                'desc'        => 'Введите название блока контактной информации 2',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'label'       => 'Содержание блока контактной информации 2',
                'id'          => 'contact_page_block_content_2',
                'type'        => 'textarea',
                'desc'        => 'Введите содержание блока контактной информации 2',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'label'       => 'Название блока контактной информации 3',
                'id'          => 'contact_page_block_name_3',
                'type'        => 'text',
                'desc'        => 'Введите название блока контактной информации 3',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'id'          => 'contact_page_phone_list',
                'label'       => 'Телефоны',
                'type'        => 'list-item',
                'desc'        => '',
                'condition'   => 'contact_info_show:is(on)',
                'settings'    => array(
                    array(
                        'id'          => 'contact_page_phone',
                        'label'       => 'Введите контактный телефон',
                        'desc'        => '',
                        'type'        => 'text',
                    ),
                    array(
                        'id'          => 'contact_page_phone_provider',
                        'label'       => 'Введите провайдера связи',
                        'desc'        => '',
                        'type'        => 'text',
                    )
                ),
            ),
            array(
                'label'       => 'Название блока контактной информации 4',
                'id'          => 'contact_page_block_name_4',
                'type'        => 'text',
                'desc'        => 'Введите название блока контактной информации 4',
                'condition'   => 'contact_info_show:is(on)',
            ),
            array(
                'id'          => 'contact_page_email_list',
                'label'       => 'Электронный адрес',
                'type'        => 'list-item',
                'desc'        => '',
                'condition'   => 'contact_info_show:is(on)',
                'settings'    => array(
                    array(
                        'id'          => 'contact_page_email',
                        'label'       => 'Введите электронный адрес',
                        'desc'        => '',
                        'type'        => 'text',
                    )
                ),
            ),
        )
    );

    $meta_box_price_list = array(
        'id'          => 'seedling_meta_box',
        'title'       => 'Настройки страницы сорта',
        'desc'        => '',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Акция',
                'id'          => 'action_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Заголовок акции',
                'id'          => 'title_action',
                'type'        => 'text',
                'desc'        => 'Введите заголовок акции'
            ),
            array(
                'label'       => 'Скидка акции',
                'id'          => 'discount_action',
                'type'        => 'text',
                'desc'        => 'Введите описание и скидку для акции'
            ),
            array(
                'label'       => 'QR-код',
                'id'          => 'qr_code_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Показать QR-код ?',
                'id'          => 'qr_code_show',
                'type'        => 'on-off',
                'desc'        => 'Показать или скрыть QR-код',
                'std'         => 'off'
            ),
            array(
                'label'       => 'QR-код',
                'id'          => 'qr_code_picture',
                'type'        => 'upload',
                'desc'        => 'Загрузите картинку qr кода',
                'condition'   => 'qr_code_show:is(on)',
            ),
            array(
                'label'       => 'Прайс-лист',
                'id'          => 'price_list_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Показать ссылки для скачивания прайс-листа?',
                'id'          => 'price_list_show',
                'type'        => 'on-off',
                'desc'        => 'Показать или скрыть ссылки для скачивания прайс-листа',
                'std'         => 'off'
            ),
            array(
                'id'          => 'price_list_list',
                'label'       => 'Прайс-лист',
                'type'        => 'list-item',
                'desc'        => '',
                'condition'   => 'price_list_show:is(on)',
                'settings'    => array(
                    array(
                        'id'          => 'price_list_icon',
                        'label'       => 'Иконка Font Awesome',
                        'desc'        => 'Вставьте css класс иконки (например: fa-phone), посмотреть можно <a href="https://fontawesome.ru/cheatsheet/" target="_blank">здесь</a>',
                        'type'        => 'text',
                    ),
                    array(
                        'id'          => 'price_list_text',
                        'label'       => 'Введите текс ссылки',
                        'desc'        => '',
                        'type'        => 'text',
                    ),
                    array(
                        'id'          => 'price_list_link',
                        'label'       => 'Загрузите документ',
                        'desc'        => '',
                        'type'        => 'upload',
                    )
                ),
            ),
        )
    );

    $meta_box_seedling = array(
        'id'          => 'seedling_meta_box',
        'title'       => 'Настройки страницы сорта',
        'desc'        => '',
        'pages'       => array( 'seedling' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Цена',
                'id'          => 'sort_price_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Цена',
                'id'          => 'sort_price',
                'type'        => 'text',
                'desc'        => 'Введите цену товара'
            ),
            array(
                'label'       => 'Характеристики сорта',
                'id'          => 'sort_characteristics_tab',
                'type'        => 'tab'
            ),
            array(
                'label'       => 'Показать характеристики сорта ?',
                'id'          => 'sort_characteristics_show',
                'type'        => 'on-off',
                'desc'        => 'Показать или скрыть характеристики сорта',
                'std'         => 'off'
            ),
            array(
                'label'       => 'Возраст товара',
                'id'          => 'age_sort',
                'type'        => 'text',
                'desc'        => 'Введите возраст товара',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
            array(
                'label'       => 'Подвой',
                'id'          => 'rootstock_sort',
                'type'        => 'text',
                'desc'        => 'Введите подвой',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
            array(
                'label'       => 'Срок созревания',
                'id'          => 'ripening_period',
                'type'        => 'text',
                'desc'        => 'Введите срок созревания',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
            array(
                'label'       => 'Размер ягод или плодов',
                'id'          => 'size_sort',
                'type'        => 'text',
                'desc'        => 'Введите размер ягод или плодов',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
            array(
                'label'       => 'Вкус',
                'id'          => 'taste_sort',
                'type'        => 'text',
                'desc'        => 'Введите вкус',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
            array(
                'label'       => 'Цвет ягод или плодов',
                'id'          => 'color_sort',
                'type'        => 'text',
                'desc'        => 'Введите цвет ягод или плодов',
                'condition'   => 'sort_characteristics_show:is(on)',
            ),
        )
    );

    /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'demo_meta_box',
    'title'       => __( 'Demo Meta Box', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Conditions', 'theme-text-domain' ),
        'id'          => 'demo_conditions',
        'type'        => 'tab'
      ),
      array(
        'label'       => __( 'Show Gallery', 'theme-text-domain' ),
        'id'          => 'demo_show_gallery',
        'type'        => 'on-off',
        'desc'        => sprintf( __( 'Shows the Gallery when set to %s.', 'theme-text-domain' ), '<code>on</code>' ),
        'std'         => 'off'
      ),
      array(
        'label'       => '',
        'id'          => 'demo_textblock',
        'type'        => 'textblock',
        'desc'        => __( 'Congratulations, you created a gallery!', 'theme-text-domain' ),
        'operator'    => 'and',
        'condition'   => 'demo_show_gallery:is(on),demo_gallery:not()'
      ),
      array(
        'label'       => __( 'Gallery', 'theme-text-domain' ),
        'id'          => 'demo_gallery',
        'type'        => 'gallery',
        'desc'        => sprintf( __( 'This is a Gallery option type. It displays when %s.', 'theme-text-domain' ), '<code>demo_show_gallery:is(on)</code>' ),
        'condition'   => 'demo_show_gallery:is(on)'
      ),
      array(
        'label'       => __( 'More Options', 'theme-text-domain' ),
        'id'          => 'demo_more_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => __( 'Text', 'theme-text-domain' ),
        'id'          => 'demo_text',
        'type'        => 'text',
        'desc'        => __( 'This is a demo Text field.', 'theme-text-domain' )
      ),
      array(
        'label'       => __( 'Textarea', 'theme-text-domain' ),
        'id'          => 'demo_textarea',
        'type'        => 'textarea',
        'desc'        => __( 'This is a demo Textarea field.', 'theme-text-domain' )
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );
    ot_register_meta_box( $meta_box_seedling );

    $post_id = isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : 0 );
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    if($template_file == 'main-page.php') {
        ot_register_meta_box( $main_page );
    }
    if ( $template_file == 'contact-page.php' ){
        ot_register_meta_box( $meta_box_contact );
    }

    if ( $template_file == 'price_list-page.php' ){
        ot_register_meta_box( $meta_box_price_list );
    }
}