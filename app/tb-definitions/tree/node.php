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
            ),
            'Изображения' => array(
                'preview',
                //'image_card_fake',
                //'image_card_front',
                'image_background',
                'image_background_single',
                'logo',
                'image_right_column',
            ),
            'Файлы'  => array(
                'file',
            ),
            'Признаки'  => array(
                'is_active',
                'is_top_menu',
                'is_main_menu',
                'is_main_menu_link',
                'is_side_menu',
                'is_footer_menu',
                'is_hide_catalog',
                'is_show_main',
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
        'preview' => array(
            'caption' => 'Превью',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'image_card_fake' => array(
            'caption' => 'Изображение (фейк)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
            'hide_list' => true,
            'hide' => true,
        ),
        'image_card_front' => array(
            'caption' => 'Изображение (фронт)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
            'hide_list' => true,
            'hide' => true,
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
        'image_right_column' => array(
            'caption' => 'Изображение в правой колонке',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'file' => array(
            'caption' => 'Файл',
            'type' => 'file',
        ),
        'benefits' => array(
            'caption' => 'Особенности',
            'type' => 'textarea',
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
            'type' => 'textarea',
            'rows' => 5,
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
        'link' => array(
            'caption' => 'Ссылка',
            'type' => 'text'
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
        'is_show_main' => array(
            'caption' => 'Показывать на главной',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
/*        'is_fixed_main' => array(
            'caption' => 'Зафиксировать на главной',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),*/
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
    ),
    
    'actions' => array(
        'search' => array(
            'caption' => 'Search',
        ),
        'insert' => array(
            'caption' => 'Create',
            'check' => function() {
                return true;
            }
        ),
        'update' => array(
            'caption' => 'Update',
            'check' => function() {
                return true;
            }
        ),
        'delete' => array(
            'caption' => 'Remove',
            'check' => function() {
                return true;
            }
        ),
    ),
);