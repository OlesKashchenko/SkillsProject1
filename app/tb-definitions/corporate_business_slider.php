<?php

return array(
    'db' => array(
        'table' => 'slider_items',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => 10,
            'uri' => '/admin/corporate-business-slider',
        ),
    ),
    
    'options' => array(
        'caption' => 'Слайдер Корпоративному бизнесу',
        'ident' => 'corporate-business-slider-container',
        'form_ident' => 'corporate-business-slider-form',
        'table_ident' => 'corporate-business-slider-table',
        'action_url' => '/admin/handle/corporate-business-slider',
        'not_found' => 'NOT FOUND',
        'form_width' => '920px',
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
        'description' => array(
            'caption' => 'Описание',
            'type' => 'textarea',
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
        'image' => array(
            'caption' => 'Изображение',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'link' => array(
            'caption' => 'Ссылка',
            'type' => 'text'
        ),
        'active' => array(
            'caption' => 'Активность',
            'type' => 'set',
            'options' => array(
                'ua' => 'Укр',
                'ru' => 'Рус',
                'en' => 'Англ',
            ),
        ),
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide_list' => true,
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide_list' => true,
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
    ),

    'filters' => array(
        'entity' => array(
            'sign' => '=',
            'value' => 'corporate'
        )
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