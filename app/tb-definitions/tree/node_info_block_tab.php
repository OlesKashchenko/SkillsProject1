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
                'label',
                'short_description',
                'description',
                'text',
                'benefits',
                'benefits_description',
                'options',
                'info_block_tab_type',
            ),
            'Изображения' => array(
                'preview',
                'image_background',
            ),
            'Признаки'  => array(
                'is_active',
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
        'image_background' => array(
            'caption' => 'Изображение (фон)',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
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
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'set',
            'options' => array(
                'ua' => 'Укр',
                'ru' => 'Рус',
                'en' => 'Англ',
            ),
        ),
        'info_block_tab_type' => array(
            'caption' => 'Тип содержимого таба',
            'type' => 'select',
            'options' => array(
                'empty'                     => '...',
                'description'               => 'Описание',
                'description_double'        => 'Описание (двойной)',
                'list_two'                  => 'Список (две колонки)',
                'list_three'                => 'Список (три колонки)',
                'description_list'          => 'Описание и список',
                'image_list'                => 'Изображение и список',
                'infograph'                 => 'Инфографика',
                'infograph_slider'          => 'Инфографика (слайдер)',
                'image_description_slider'  => 'Изображение и описание (слайдер)',
                'description_image_slider'  => 'Описание и изображение (слайдер)',
                'sequence'                  => 'Последовательность',
                'list_icons'                => 'Список иконок',
                'rates'                     => 'Тарифы',
                'template_rates'            => 'Шаблон тарифный',
                'template_simple'           => 'Шаблон обычный',
                'template_simple_alt'       => 'Шаблон обычный (альтернативный)',
                'template_simple_two'       => 'Шаблон обычный (две колонки)',
                'files_list'                => 'Список файлов',
            ),
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