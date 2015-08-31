<?php
return array(
    'db' => array(
        'table' => 'cards_credit',
        'order' => array(
            'id' => 'DESC',
        ),
        'pagination' => array(
            'per_page' => 20,
            'uri' => '/admin/cards-credit',
        ),
    ),
    'options' => array(
        'caption' => 'Кредитные карты',
        'ident' => 'cards-credit-container',
        'form_ident' => 'cards-credit-form',
        'table_ident' => 'cards-credit-table',
        'action_url' => '/admin/handle/cards-credit',
        'not_found' => 'NOT FOUND',
    ),
    'fields' => array(
        'id' => array(
            'caption' => '#',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'hide' => true,
            'filter' => 'text',
            'is_sorting' => true
        ),
        'id_catalog' => array(
            'caption' => 'Карта каталога',
            'type'    => 'foreign',
            'filter'  => 'text',
            'is_readonly'  => false,
            'alias'        => 'c',
            'foreign_table'       => 'tb_tree',
            'foreign_key_field'   => 'id',
            'foreign_value_field' => 'title',
            'additional_where' => array(
                'parent_id' => array(
                    'sign'  => '=',
                    'value' => 18,
                )
            ),
        ),
        'technologies' => array(
            'caption' => 'Технологии',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Технологии (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Технологии (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Технологии (англ)'
                ),
            )
        ),
        'payment' => array(
            'caption' => 'Плата за обслуживание',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Плата за обслуживание (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Плата за обслуживание (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Плата за обслуживание (англ)'
                ),
            )
        ),
        'withdrawal' => array(
            'caption' => 'Снятие наличных',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Снятие наличных (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Снятие наличных (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Снятие наличных (англ)'
                ),
            )
        ),
        'loan_rate' => array(
            'caption' => 'Ставка по кредиту',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Ставка по кредиту (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Ставка по кредиту (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Ставка по кредиту (англ)'
                ),
            )
        ),
        'balance_percent' => array(
            'caption' => 'Процент на остаток средств',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Процент на остаток средств (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Процент на остаток средств (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Процент на остаток средств (англ)'
                ),
            )
        ),
        'promos' => array(
            'caption' => 'Программы скидок',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Программы скидок (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Программы скидок (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Программы скидок (англ)'
                ),
            )
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
            'check' => function() {
                return true;
            }
        ),
        'update' => array(
            'caption' => 'Обновить',
            'check' => function() {
                return true;
            }
        ),
        'delete' => array(
            'caption' => 'Удалить',
            'check' => function() {
                return true;
            }
        ),
    ),

);