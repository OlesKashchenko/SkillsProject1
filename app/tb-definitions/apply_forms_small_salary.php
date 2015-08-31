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
            'uri' => '/admin/apply-forms/small-business/salary',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки на зарплатный проект',
        'ident' => 'apply-forms-salary',
        'form_ident' => 'apply-forms-salary-form',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-salary-table',
        'action_url' => '/admin/handle/apply-forms/small-business/salary',
        //'handler' => 'ApplyFormTableHandler',
        'not_found' => 'NOT FOUND',
    ),

    'position' => array(
        'tabs' => array(
            'Общая информация' => array(
                'id',
                'id_catalog',
                'created_at',
                'updated_at',
            ),
            'Личные данные' => array(
                'last_name',
                'first_name',
                'patronymic_name',
                'phone_number',
                'email',
                'partner_code',
                //'id_occupation',
                'id_city',
            ),
        ),
    ),

    'fields' => array(
        'id' => array(
            'caption' => 'ID',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'is_sorting' => true
        ),
        'id_catalog' => array(
            'caption' => 'Продукт',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'tb_tree',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'fffft',
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
        'partner_code' => array(
            'caption' => 'Код партнера',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => 'true',
        ),
        /*
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
        */
        'id_city' => array(
            'caption' => 'Город',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'cities',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title_ru',
            'alias' => 'ct',
            'is_null' => true,
            'hide_list' => true,
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
        'type' => array(
            'sign'  => '=',
            'value' => 'sb_salary'
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
