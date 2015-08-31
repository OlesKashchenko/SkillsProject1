<?php

return array(

    'permissions' => array(
        'users_groups' => array(
            'caption' => 'Пользователи / Группы',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'main_slider' => array(
            'caption' => 'Слайдер на главной',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'translates' => array(
            'caption' => 'Переводы',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'apply_forms' => array(
            'caption' => 'Заявки клиентов',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'feedback_forms' => array(
            'caption' => 'Обратная связь',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'rates' => array(
            'caption' => 'Курсы валют',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'news' => array(
            'caption' => 'Новости',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'offices' => array(
            'caption' => 'Отделения',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'settings' => array(
            'caption' => 'Настройки',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
        'calculators' => array(
            'caption' => 'Калькулаторы',
            'rights'  => array(
                'view'   => 'Просмотр',
            ),
        ),
    ),

    'check' => array(
        'users' => array(
            'create' => function() {
                return true;
            },
            'update' => function() {
                return true;
            },
            'delete' => function() {
                return true;
            },
        ),
        'groups' => array(
            'create' => function() {
                return true;
            },
            'update' => function() {
                return true;
            },
            'delete' => function() {
                return true;
            },
        ),
    ),

);
