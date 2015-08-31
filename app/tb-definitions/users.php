<?php

return array(
    'db' => array(
        'table' => 'users',
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
            'uri' => '/admin/tb/users',
        ),
    ),
    'options' => array(
        'caption' => 'Пользователи',
        'ident' => 'users-container',
        'form_ident' => 'users-form',
        'table_ident' => 'users-table',
        'action_url' => '/admin/handle/users',
        'handler'    => 'UsersTableHandler',
        'not_found'  => 'NOT FOUND',
    ),
    
    'fields' => array(
        'id' => array(
            'caption' => '#',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'hide' => true,
        ),
        'email' => array(
            'caption' => 'Email',
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
            ),
        ),
        'last_name' => array(
            'caption' => 'Фамилия',
            'type'    => 'text',
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
            ),
        ),
        'first_name' => array(
            'caption'   => 'Имя',
            'type'      => 'text',
            'filter'    => 'text',
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
            ),
        ),
        'activated' => array(
            'caption' => 'Активен',
            'type' => 'checkbox',
            'filter' => 'select',
            'options' => array(
                1 => 'Активные',
                0 => 'He aктивные',
            ),
        ),
        'last_login' => array(
            'caption' => 'Дата последнего входа',
            'type' => 'readonly',
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
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
    ),
    
    'actions' => array(
        'search' => array(
            'caption' => 'Поиск',
        ),
        'insert' => array(
            'caption' => 'Добавить',
        ),
        'custom' => array(
            array(
                'caption' => 'Редактировать',
                'icon' => 'pencil',
                'link' => '/admin/tb/users/%d',
                'params' => array(
                    'id'
                )
            )
        ),
        'delete' => array(
            'caption' => 'Удалить',
        ),
    ),

    /*
    'callbacks' => array(
        'onUpdateRowResponse' => function(array &$response) {
            $def = $this->controller->getDefinition();
            EventsBackend::log(array(
                'ident' => $def['db']['table'] .'_update',
                'object_table' => $def['db']['table'],
                'object_id' => Input::get('id')
            ));
        },
        'onInsertRowResponse' => function(array &$response) {
            $def = $this->controller->getDefinition();
            EventsBackend::log(array(
                'ident' => $def['db']['table'] .'_insert',
                'object_table' => $def['db']['table'],
                'object_id' => Input::get('id')
            ));
        },
        'onDeleteRowResponse' => function(array &$response) {
            $def = $this->controller->getDefinition();
            EventsBackend::log(array(
                'ident' => $def['db']['table'] .'_delete',
                'object_table' => $def['db']['table'],
                'object_id' => Input::get('id')
            ));
        },
    )
    */
);