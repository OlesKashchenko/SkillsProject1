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
            'uri' => '/admin/apply-forms/deposit',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки на депозит',
        'ident' => 'apply-forms-deposit',
        'form_ident' => 'apply-forms-deposit-form',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-deposit-table',
        'action_url' => '/admin/handle/apply-forms/deposit',
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
                'partner_code',
                'is_bank_client',
            ),
            'Калькулятор' => array(
                'deposit_amount',
                'term',
                'monthly_installment',
                'currency',
                'interest_payment_percent',
                'interest_payment_type',
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
        'partner_code' => array(
            'caption' => 'Код партнера',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => 'true',
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
        'deposit_amount' => array(
            'caption' => 'Сумма вклада',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'term' => array(
            'caption' => 'Срок (мес)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'monthly_installment' => array(
            'caption' => 'Ежемесячный взнос',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'currency' => array(
            'caption' => 'Валюта',
            'type' => 'select',
            'filter' => 'text',
            'hide_list' => true,
            'options' => array(
                'uah' => 'UAH',
                'usd' => 'USD',
                'eur' => 'EUR'
            )
        ),
        'interest_payment_percent' => array(
            'caption' => 'Выплаты процентов (%)',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'interest_payment_type' => array(
            'caption' => 'Выплаты процентов ()',
            'type' => 'select',
            'filter' => 'text',
            'options' => array(
                'end'           => 'в конце срока',
                'monthly'       => 'ежемесячно',
                'capitalize'    => 'капитализируя'
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
            'value' => 'deposit'
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
