<?php

return array(
    'db' => array(
        'table' => 'cities',
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
            'uri' => '/admin/cities',
        ),
    ),
    'options' => array(
        'caption' => 'Города',
        'ident' => 'cities',
        'form_ident' => 'cities-form',
        'form_width' => '920px',
        'table_ident' => 'cities-table',
        'action_url' => '/admin/handle/cities',
        'not_found' => 'NOT FOUND',
    ),
    'cache' => array(
        'tags' => array('cities'),
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
        'id_region' => array(
            'caption' => 'Область',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'regions',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title_ru',
            'alias' => 'r',
        ),
        'latitude' => array(
            'caption' => 'Координата (широта)',
            'type' => 'text',
            'filter' => 'text',
            'placeholder' => 'Координата (широта)'
        ),
        'longitude' => array(
            'caption' => 'Координата (долгота)',
            'type' => 'text',
            'filter' => 'text',
            'placeholder' => 'Координата (долгота)'
        ),
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'filter' => 'text',
            'options' => array(
                0 => 'Неактивен',
                1 => 'Активен',
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