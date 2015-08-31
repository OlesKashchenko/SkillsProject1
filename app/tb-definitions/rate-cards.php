<?php
return array(
	'db' => array(
		'table' => 'rates',
		'order' => array(
			'id' => 'DESC',
		),
		'pagination' => array(
			'per_page' => array(
				10 => '10',
				20 => '20'
			),
			'uri' => '/admin/rates',
		),
	),
	'options' => array(
		'caption' => 'Платежные карты',
		'ident' => 'rate-cards',
		'form_ident' => 'rate-cards-form',
		'table_ident' => 'rate-cards-table',
		'action_url' => '/admin/handle/rate-cards',
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
		'currency' => array(
			'caption'     => 'Валюта',
			'type'        => 'select',
			'filter'      => 'select',
			'class'       => 'col-id',
			'is_sorting'  => true,
			'options' => array(
				'USD' => 'USD',
				'EUR'  => 'EUR',
				'RUB'  => 'RUB',
			)
		),
		'sale' => array(
			'caption'     => 'Продажа',
			'type' => 'text',
			'filter' => 'text',
			'is_sorting' => true
		),
		'buy' => array(
			'caption' => 'Покупка',
			'type' => 'text',
			'filter' => 'text',
			'is_sorting' => true
		),
		'type' => array(
			'caption'     => 'Тип курса',
			'type'        => 'readonly',
			'hide_list' => true,
			'hide' => true,
			'is_sorting'  => true,
		),
		'name_card' => array(
			'caption'     => 'Тип карты',
			'type' => 'text',
			'filter' => 'text',
			'is_sorting'  => true,
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
		'type' => array(
			'sign'  => '=',
			'value' => '2'
		)
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