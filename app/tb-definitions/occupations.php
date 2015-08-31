<?php

return array(
    'db' => array(
        'table' => 'occupations',
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
            'uri' => '/admin/occupations',
        ),
    ),
    'options' => array(
        'caption' => 'Виды занятости',
        'ident' => 'occupations',
        'form_ident' => 'occupations-form',
        'form_width' => '920px',
        'table_ident' => 'occupations-table',
        'action_url' => '/admin/handle/occupations',
        'not_found' => 'NOT FOUND',
    ),
    'cache' => array(
        'tags' => array('occupations'),
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
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Активен',
                1 => 'Неактивен',
            ),
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