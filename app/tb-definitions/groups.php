<?php

return array(
    'db' => array(
        'table' => 'groups',
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
            'uri' => '/admin/tb/groups',
        ),
    ),
    'options' => array(
        'caption' => 'Группы пользователи',
        'ident' => 'groups-container',
        'form_ident' => 'groups-form',
        'table_ident' => 'groups-table',
        'action_url' => '/admin/handle/groups',
        'handler'    => 'GroupsTableHandler',
        'not_found'  => 'NOT FOUND',
    ),
    
    'fields' => array(
        'id' => array(
            'caption' => '#',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'hide' => true,
            'is_sorting' => true,
        ),
        'title' => array(
            'caption' => 'Имя',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
        ),
        'name' => array(
            'caption' => 'Название',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
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
                'link' => '/admin/tb/groups/%d',
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