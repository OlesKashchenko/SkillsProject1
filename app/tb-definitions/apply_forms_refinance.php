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
            'uri' => '/admin/apply-forms/refinance',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки на рефинансирование',
        'ident' => 'apply-forms-refinance',
        'form_ident' => 'apply-forms-refinance-form',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-refinance-table',
        'action_url' => '/admin/handle/apply-forms/refinance',
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
                'passport',
                'inn',
                'partner_code',
                'id_occupation',
                'is_bank_client',
            ),
            'Калькулятор' => array(
                'monthly_fee',
                'left_to_repay_months',
                'left_to_repay_money',
                'credit_type',
                'is_insurance_loss_job',
                'is_insurance_accident',
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
        'monthly_fee' => array(
            'caption' => 'Ежемесячная плата',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'left_to_repay_months' => array(
            'caption' => 'Осталось погашать (месяцы)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'left_to_repay_money' => array(
            'caption' => 'Осталось погашать (деньги)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'credit_type' => array(
            'caption' => 'Тип кредита',
            'type' => 'select',
            'filter' => 'text',
            'options' => array(
                '' => '-',
                'simple' => 'Кредит',
                'card' => 'Кредит на карте'
            ),
            'hide_list' => true,
        ),
        'is_insurance_loss_job' => array(
            'caption' => 'Страховка от временной потери работы',
            'type' => 'checkbox',
            'filter' => 'text',
            'options' => array(
                0 => 'Нет',
                1 => 'Да'
            ),
            'hide_list' => true,
        ),
        'is_insurance_accident' => array(
            'caption' => 'Страховка от несчастного случая',
            'type' => 'checkbox',
            'filter' => 'text',
            'options' => array(
                0 => 'Нет',
                1 => 'Да'
            ),
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
            'value' => 'refinance'
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