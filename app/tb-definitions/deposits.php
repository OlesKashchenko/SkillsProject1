<?php
return array(
    'db' => array(
        'table' => 'deposits',
        'order' => array(
            'id' => 'DESC',
        ),
        'pagination' => array(
            'per_page' => 20,
            'uri' => '/admin/deposits',
        ),
    ),
    'options' => array(
        'caption' => 'Депозиты',
        'ident' => 'deposits-container',
        'form_ident' => 'deposits-form',
        'table_ident' => 'deposits-table',
        'action_url' => '/admin/handle/deposits',
        'not_found' => 'NOT FOUND',
    ),
    'cache' => array(
        'tags' => array('deposits'),
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
        'id_tb_tree' => array(
            'caption' => 'Депозит',
            'type'    => 'foreign',
            'filter'  => 'text',
            'is_null' => false,
            'is_readonly'  => false,
            'alias'        => 'c',
            'foreign_table'       => 'tb_tree',
            'foreign_key_field'   => 'id',
            'foreign_value_field' => 'title',
            'additional_where' => array(
                'parent_id' => array(
                    'sign'  => '=',
                    'value' => '210'
                )
            ),
        ),
        'amount_from' => array(
            'caption' => 'Сумма вклада (от)',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true
        ),
        'monthly_installment' => array(
            'caption' => 'Ежемесячное пополнение (от)',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true
        ),
        'frequency_payment' => array(
            'caption'     => 'Периодичность виплаты',
            'type'        => 'select',
            'class'       => 'col-id',
            'width'       => '1%',
            'is_sorting'  => true,
            'filter' => 'select',
            'options' => array(
                'end'           => 'В конце срока',
                'monthly'       => 'Ежемесячно ',
                'capitalize'    => 'Капитализация',
            ),
        ),
        'term' => array(
            'caption' => 'Срок вклада',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true
        ),
        'term_type' => array(
            'caption'     => 'Тип срока',
            'type'        => 'select',
            'filter'      => 'select',
            'class'       => 'col-id',
            'width'       => '1%',
            'is_sorting'  => true,
            'options' => array(
                'day'       => 'дней',
                'month'     => 'месяцев',
                'year'      => 'лет',
            )
        ),
        'currency' => array(
            'caption'     => 'Валюта',
            'type'        => 'select',
            'filter'      => 'select',
            'class'       => 'col-id',
            'width'       => '1%',
            'is_sorting'  => true,
            'options' => array(
                'uah' => 'Гривна',
                'usd'  => 'Доллары',
                'eur'  => 'Евро',
            )
        ),
        'percent' => array(
            'caption' => 'Годовая базовая процентная ставка',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true
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
            'caption' => 'Update',
            'check' => function() {
                return true;
            }
        ),
        'delete' => array(
            'caption' => 'Remove',
            'check' => function() {
                return true;
            }
        ),
    ),
);
