<?php

return array(
    'db' => array(
        'table' => 'apply_forms_partners',
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
            'uri' => '/admin/apply-forms-partners',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки партнеров',
        'ident' => 'apply-forms-partners',
        'form_ident' => 'apply-forms-form-partners',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-partners-table',
        'action_url' => '/admin/handle/apply-forms-partners',
        //'handler' => 'ApplyFormPartnersTableHandler',
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
            'hide_list' => true,
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
        'partner_last_name' => array(
            'caption' => 'Фамилия партнера',
            'type' => 'text',
            'filter' => 'text',
        ),
        'partner_first_name' => array(
            'caption' => 'Имя партнера',
            'type' => 'text',
            'filter' => 'text',
        ),
        'partner_patronymic_name' => array(
            'caption' => 'Отчество партнера',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'partner_phone_number' => array(
            'caption' => 'Номер телефона',
            'type' => 'text',
            'filter' => 'text',
        ),
        'id_occupation' => array(
            'caption' => 'Занятость',
            'type' => 'foreign',
            'filter' => 'text',
            'is_null' => true,
            'hide_list' => true,
            'foreign_table' => 'occupations',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'o',
        ),
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide_list' => true,
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide_list' => true,
            'hide' => true,
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