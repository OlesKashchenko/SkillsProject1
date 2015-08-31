<?php

return array(
    'db' => array(
        'table' => 'apply_forms',
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
            'uri' => '/admin/apply-forms',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки клиентов',
        'ident' => 'apply-forms',
        'form_ident' => 'apply-forms-form',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-table',
        'action_url' => '/admin/handle/apply-forms',
        'handler' => 'ApplyFormTableHandler',
        'not_found' => 'NOT FOUND',
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
        'id_catalog' => array(
            'caption' => 'Продукт',
            'type' => 'foreign',
            'filter' => 'text',
            'hide' => false,
            'is_null' => true,
            'foreign_table' => 'tb_tree',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'ft',
        ),
        'last_name' => array(
            'caption' => 'Фамилия',
            'type' => 'text',
            'filter' => 'text',
        ),
        'first_name' => array(
            'caption' => 'Имя',
            'type' => 'text',
            'filter' => 'text',
        ),
        'patronymic_name' => array(
            'caption' => 'Отчество',
            'type' => 'text',
            'filter' => 'text',
        ),
        'phone_number' => array(
            'caption' => 'Номер телефона',
            'type' => 'text',
            'filter' => 'text',
        ),
        'email' => array(
            'caption' => 'Email',
            'type' => 'text',
            'filter' => 'text',
        ),
        'passport' => array(
            'caption' => 'Паспорт',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => 'true',
        ),
        'inn' => array(
            'caption' => 'ИНН',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => 'true',
        ),
        'partner_code' => array(
            'caption' => 'Код партнера',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => 'true',
        ),
        'id_occupation' => array(
            'caption' => 'Занятость',
            'type' => 'foreign',
            'filter' => 'text',
            'hide' => false,
            'is_null' => true,
            'foreign_table' => 'occupations',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'o',
        ),
        'is_bank_client' => array(
            'caption' => 'Клиент банка',
            'type' => 'checkbox',
            'hide_list' => 'true',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
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