<?php

return array(
    'db' => array(
        'table' => 'tb_tree',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => 1,
            'uri' => '/admin/tree',
        ),
    ),
    
    'options' => array(
        'caption' => 'Settings',
        'ident' => 'settings-container',
        'form_ident' => 'settings-form',
        'table_ident' => 'settings-table',
        'action_url' => '/admin/tree?node='. $options['node'],
        'not_found' => 'NOT FOUND',
        'form_width' => '1000px',
    ),

    'cache' => array(
        'tags' => array('cards'),
    ),

    'position' => array(
        'tabs' => array(
            'Общая'     => array(
                'id',
                'slug',
                'title',
                'short_description',
                'description',
                'text',
            ),
            'Доп. поля'     => array(
                'label',
                'benefits',
                'benefits_description',
                'options',
                'link',
                'link_main',
            ),
            'Изображения' => array(
                'image_card_fake',
                'image_card_front',
                'image_background',
                'image_background_single',
                'logo',
            ),
            'Связи' => array(
                'many2many_categories',
                'many2many_programs',
            ),
            'Признаки'  => array(
                'is_active',
                'is_top_menu',
                'is_main_menu',
                'is_main_menu_link',
                'is_side_menu',
                'is_footer_menu',
                'is_hide_catalog',
                'is_pay_pass',
                'is_chip',
            ),
            'SEO'    => array(
                'seo_title',
                'seo_description',
                'seo_keywords',
            ),
        )
    ),

    'fields' => array(
        'id' => array(
            'caption' => '#',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'hide' => true,
            'is_sorting' => true
        ),
        'slug' => array(
            'caption' => 'slug',
            'type' => 'text'
        ),
        'title' => array(
            'caption' => 'Название',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Название (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Название (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Название (англ)'
                ),
            )
        ),
        'label' => array(
            'caption' => 'Лейбл',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Лейбл (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Лейбл (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Лейбл (англ)'
                ),
            )
        ),
        'short_description' => array(
            'caption' => 'Краткое описание',
            'type' => 'textarea',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Краткое описание (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Краткое описание (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Краткое описание (англ)'
                ),
            )
        ),
        'description' => array(
            'caption' => 'Описание',
            'type' => 'wysiwyg',
            'wysiwyg' => 'redactor',
            'editor-options' => array(
                'replaceDivs' => 'false',
                'removeWithoutAttr' => "['i']",
                'cleanOnPaste' => 'true',
                'removeAttr' =>  "[['table', ['width', 'cellpadding', 'cellspacing', 'valign', 'border', 'class', 'style']], ['col', ['width', 'style']], ['tr', ['valign', 'style', 'height']], ['td', ['width', 'height', 'style', 'valign']], ['p', ['style', 'class', 'align']], ['span', 'style']]",
            ),
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Описание (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Описание (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Описание (англ)'
                ),
            )
        ),
        'text' => array(
            'caption' => 'Содержимое',
            'type' => 'textarea',
            'rows' => 5,
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Содержимое (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Содержимое (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Содержимое (англ)'
                ),
            )
        ),
        'image_card_fake' => array(
            'caption' => 'Изображение (фейк)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'image_card_front' => array(
            'caption' => 'Изображение (фронт)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'image_background' => array(
            'caption' => 'Изображение (фон)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'image_background_single' => array(
            'caption' => 'Изображение (фон на странице продукта)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'logo' => array(
            'caption' => 'Лого',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'benefits' => array(
            'caption' => 'Особенности',
            'type' => 'textarea',
            'rows' => 5,
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Особенности (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Особенности (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Особенности (англ)'
                ),
            )
        ),
        'benefits_description' => array(
            'caption' => 'Описание особенностей',
            'rows' => 5,
            'type' => 'textarea',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Описание особенностей (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Описание особенностей (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Описание особенностей (англ)'
                ),
            )
        ),
        'options' => array(
            'caption' => 'Опции',
            'type' => 'textarea',
            'rows' => 5,
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Опции (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Опции (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Опции (англ)'
                ),
            )
        ),
        'link_main' => array(
            'caption' => 'Ссылка(главная)',
            'type' => 'text',
            'filter' => 'text',
        ),
        'link' => array(
            'caption' => 'Exfront - ссылка',
            'type' => 'text',
            'filter' => 'text',
        ),

        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'set',
            'options' => array(
                'ua' => 'Укр',
                'ru' => 'Рус',
                'en' => 'Англ',
            ),
        ),
        'is_top_menu' => array(
            'caption' => 'Пункт топ-меню',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_main_menu' => array(
            'caption' => 'Пункт главного меню',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_main_menu_link' => array(
            'caption' => 'Является ссылкой в главном меню',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_side_menu' => array(
            'caption' => 'Пункт бокового меню',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_footer_menu' => array(
            'caption' => 'Пункт меню в футере',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_hide_catalog' => array(
            'caption' => 'Скрыть в каталоге',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_pay_pass' => array(
            'caption' => 'Pay Pass',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_chip' => array(
            'caption' => 'Защита чипом',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'seo_title' => array(
            'caption' => 'Seo: title',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: title (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: title (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: title (англ)'
                ),
            )
        ),
        'seo_description' => array(
            'caption' => 'Seo: description',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: description (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: description (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: description (англ)'
                ),
            )
        ),
        'seo_keywords' => array(
            'caption' => 'Seo: keywords',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: keywords (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: keywords (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: keywords (англ)'
                ),
            )
        ),
        'many2many_categories' => array(
            'caption'                           => 'Категории карты',
            'type'                              => 'many_to_many',
            'show_type'                         => 'checkbox',
            'divide_columns'                    => 2,
            'hide_list'                         => true,
            'mtm_table'                         => 'cards2cards_categories',
            'mtm_key_field'                     => 'id_card',
            'mtm_external_foreign_key_field'    => 'id',
            'mtm_external_key_field'            => 'id_category',
            'mtm_external_value_field'          => 'title',
            'mtm_external_table'                => 'cards_categories',
        ),
        'many2many_programs' => array(
            'caption'                           => 'Бонусные программы',
            'type'                              => 'many_to_many',
            'show_type'                         => 'checkbox',
            'divide_columns'                    => 2,
            'hide_list'                         => true,
            'mtm_table'                         => 'cards2cards_programs',
            'mtm_key_field'                     => 'id_card',
            'mtm_external_foreign_key_field'    => 'id',
            'mtm_external_key_field'            => 'id_program',
            'mtm_external_value_field'          => 'title',
            'mtm_external_table'                => 'cards_programs',
        ),
    ),
    
    'actions' => array(
        'search' => array(
            'caption' => 'Поиск',
        ),
        'insert' => array(
            'caption' => 'Создать',
            'check' => function() {
                return true;
            }
        ),
        'update' => array(
            'caption' => 'Редактировать',
            'check' => function() {
                return true;
            }
        ),
        'delete' => array(
            'caption' => 'Удалить',
            'check' => function() {
                return true;
            }
        ),
    ),
);