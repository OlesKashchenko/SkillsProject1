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
            'uri' => '/admin/apply-forms/consumer',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки на потребительский кредит',
        'ident' => 'apply-forms-consumer',
        'form_ident' => 'apply-forms-consumer-form',
        'form_width' => '920px',
        'table_ident' => 'apply-forms-consumer-table',
        'action_url' => '/admin/handle/apply-forms/consumer',
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
                'id_occupation',
                'is_bank_client',
            ),
            'Калькулятор' => array(
                'id_city',
                'id_shop',
                'id_product_type',
                'product_price',
                'term',
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
        'id_city' => array(
            'caption' => 'Город',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'cities',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'ct',
            'is_null' => true,
            'hide_list' => true,
        ),
        'id_shop' => array(
            'caption' => 'Магазин',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'shops',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'st',
            'is_null' => true,
            'hide_list' => true,
        ),
        'id_product_type' => array(
            'caption' => 'Тип товара',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'products',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'pt',
            'is_null' => true,
            'hide_list' => true,
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
        'product_price' => array(
            'caption' => 'Стоимость',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
        ),
        'term' => array(
            'caption' => 'Срок кредита',
            'type' => 'text',
            'filter' => 'text',
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
            'value' => 'consumer'
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