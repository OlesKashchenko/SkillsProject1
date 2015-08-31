<?php

return array(
    'db' => array(
        'table' => 'offices',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => array(
                10 => '10',
                20 => '20',
                50 => '50',
                100 => '100',
                9999999 => 'Все'
            ),
            'uri' => '/admin/offices',
        ),
    ),
    'options' => array(
        'caption' => 'Отделения',
        'ident' => 'offices',
        'form_ident' => 'offices-form',
        'form_width' => '920px',
        'table_ident' => 'offices-table',
        'action_url' => '/admin/handle/offices',
        'not_found' => 'NOT FOUND',
    ),
    'position' => array(
        'tabs' => array(
            'Общая'     => array(
                'id',
                'title',
                'description',
                'phones',
                'director',
                'services',
                'is_active',
                'created_at',
                'updated_at',
            ),
            'Размещение'    => array(
                'id_city',
                'address',
                'metro',
                'latitude',
                'longitude',
            ),
            'Режим работы' => array(
                'schedule',
                'schedule_operations',
                'schedule_operations_post',
            ),
            'Признаки'    => array(
                'type',
                'atm_type',
                'atm_subtype',
            ),
        )
    ),
    'cache' => array(
        'tags' => array('offices'),
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
        'id_city' => array(
            'caption' => 'Город',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'cities',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title_ru',
            'alias' => 'c',
        ),
        'address' => array(
            'caption' => 'Адрес',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Адрес (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Адрес (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Адрес (англ)'
                ),
            )
        ),
        'title' => array(
            'caption' => 'Название',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Название (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Название (укр)'
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
            'hide_list' => true,
            'rows' => 5,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Описание (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Описание (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Описание (англ)'
                ),
            )
        ),
        'phones' => array(
            'caption' => 'Телефоны',
            'type' => 'textarea',
            'filter' => 'text',
            'placeholder' => 'Телефоны',
        ),
        'schedule' => array(
            'caption' => 'Режим работы',
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Режим работы (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Режим работы (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Режим работы (англ)'
                ),
            )
        ),
        'schedule_operations' => array(
            'caption' => 'Операционная касса',
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Операционная касса (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Операционная касса (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Операционная касса (англ)'
                ),
            )
        ),
        'schedule_operations_post' => array(
            'caption' => 'Операционная касса',
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Послеоперационная касса (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Послеоперационная касса (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Послеоперационная касса (англ)'
                ),
            )
        ),
        'director' => array(
            'caption' => 'Директор',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Директор (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Директор (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Директор (англ)'
                ),
            )
        ),
        'services' => array(
            'caption' => 'Услуги',
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'rows' => 5,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Услуги (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Услуги (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Услуги (англ)'
                ),
            )
        ),
        'type' => array(
            'caption' => 'Тип отделения',
            'type' => 'set',
            'filter' => 'text',
            'options' => array(
                'office' => 'Отделение',
                'mini' => 'Миниотделение',
                'atm' => 'Банкомат',
            ),
            'is_inline' => true,
        ),
        'atm_type' => array(
            'caption' => 'Тип банкомата',
            'type' => 'set',
            'filter' => 'text',
            'hide_list' => true,
            'options' => array(
                'alfa' => 'Альфа',
                'atm' => 'АТМ',
            ),
        ),
        'atm_subtype' => array(
            'caption' => 'Подтип банкомата',
            'type' => 'set',
            'filter' => 'text',
            'hide_list' => true,
            'options' => array(
                '24/7' => '24/7',
                'cash-in' => 'cash-in',
            ),
        ),
        'metro' => array(
            'caption' => 'Станции метро',
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'rows' => 5,
            'tabs' => array(
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Станции метро (рус)'
                ),
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Станции метро (укр)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Станции метро (англ)'
                ),
            )
        ),
        'latitude' => array(
            'caption' => 'Координата (широта)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
            'placeholder' => 'Координата (широта)'
        ),
        'longitude' => array(
            'caption' => 'Координата (долгота)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
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
            'hide_list' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
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
