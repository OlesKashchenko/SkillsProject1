<?php

return array(
    'db' => array(
        'table' => 'cards_programs',
        'order' => array(
            'id' => 'DESC',
        ),
        'pagination' => array(
            'per_page' => array(
                10 => '10', 
                20 => '20', 
                50 => '50',
                100 => '100',
                9999999 => 'Все'
            ),
            'uri' => '/admin/cards-programs',
        ),
    ),
    'options' => array(
        'caption' => 'Бонусные программы',
        'ident' => 'cards-programs',
        'form_ident' => 'cards-programs-form',
        'form_width' => '920px',
        'table_ident' => 'cards-programs-table',
        'action_url' => '/admin/handle/cards-programs',
        'not_found' => 'NOT FOUND',
    ),
    'cache' => array(
        'tags' => array('cards_programs'),
    ),
    'fields' => array(
        'id' => array(
            'caption' => 'ID',
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
        'image' => array(
            'caption' => 'Изображение',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide' => true,
            'hide_list' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide' => true,
            'hide_list' => true,
            'is_sorting' => true,
            'months' => 2
        ),
    ),

    'filters' => array(

    ),

    'actions' => array(
        'search' => array(
            'caption' => 'Поиск',
        ),
        'insert' => array(
            'caption' => 'Добавить',
        ),
        'update' => array(
            'caption' => 'Изменить',
        ),
        'delete' => array(
            'caption' => 'Удалить',
        ),
    ),
);
