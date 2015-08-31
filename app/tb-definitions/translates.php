<?php

return array(
    'db' => array(
        'table' => 'translations',
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
            'uri' => '/admin/translates',
        ),
    ),
    'options' => array(
        'caption' => 'Переводы',
        'ident' => 'translates-container',
        'form_ident' => 'translates-form',
        'table_ident' => 'translates-table',
        'action_url' => '/admin/handle/translates',
        'not_found' => 'NOT FOUND',
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
        'key' => array(
            'caption' => 'Идентификатор',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
            'validation' => array(
                'server' => array(
                    'rules' => 'required'
                ),
                'client' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => 'Обязательно к заполнению'
                    )   
                )
            )
        ),
        'value_ua' => array(
            'caption' => 'Перевод на укр.',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
            'validation' => array(
                'server' => array(
                    'rules' => 'required'
                ),
                'client' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => 'Обязательно к заполнению'
                    )
                )
            )
        ),
        'value_ru' => array(
            'caption' => 'Перевод на русс.',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
            'validation' => array(
                'server' => array(
                    'rules' => 'required'
                ),
                'client' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => 'Обязательно к заполнению'
                    )   
                )
            )
        ),
        'value_en' => array(
            'caption' => 'Перевод на англ.',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
            'validation' => array(
                'server' => array(
                    'rules' => 'required'
                ),
                'client' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => 'Обязательно к заполнению'
                    )   
                )
            )
        ),
    ),
    'filters' => array(
    ),
    'actions' => array(
        'insert' => array(
            'caption' => 'Добавить',
            'check' => function() {
                return Sentry::getUser()->hasAccess('translates.view');
            },
        ),
        'search' => array(
            'caption' => 'Поиск',
        ),
        'update' => array(
            'caption' => 'Update',
        ),
        'delete' => array(
            'caption' => 'Remove',
        ),
    ),
);