<?php

return array(
    'db' => array(
        'table' => 'settings_calculators',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => 12,
            'uri' => '/admin/settings/calculators/credit',
        ),
    ),

    'options' => array(
        'caption' => 'Настройки кредитного калькулятора',
        'ident' => 'calccredit-container',
        'form_ident' => 'calccredit-form',
        'table_ident' => 'calccredit-table',
        'action_url' => '/admin/handle/settings/calculators/credit',
        'not_found' => 'NOT FOUND',
    ),

    'cache' => array(
        'tags' => array('calculator_settings'),
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
        'name' => array(
            'caption' => 'Название',
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
        'value' => array(
            'caption' => 'Значение',
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
        'description' => array(
            'caption' => 'Описание',
            'type' => 'text',
            'filter' => 'text'
        ),
    ),

    'filters' => array(
        'type' => array(
            'sign' => '=',
            'value' => 'credit'
        )
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
