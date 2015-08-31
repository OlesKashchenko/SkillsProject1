<?php

return array(
    'db' => array(
        'table' => 'feedback_forms',
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
            'uri' => '/admin/feedback-forms',
        ),
    ),
    'options' => array(
        'caption' => 'Заявки на обратную связь',
        'ident' => 'feedback-forms',
        'form_ident' => 'feedback-forms-form',
        'form_width' => '920px',
        'table_ident' => 'feedback-forms-table',
        'action_url' => '/admin/handle/feedback-forms',
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
        'full_name' => array(
            'caption' => 'Полное имя',
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
        'question' => array(
            'caption' => 'Вопрос',
            'type' => 'textarea',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Вопрос (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Вопрос (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Вопрос (англ)'
                ),
            )
        ),
        'answer' => array(
            'caption' => 'Ответ',
            'type' => 'textarea',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Ответ (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Ответ (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Ответ (англ)'
                ),
            )
        ),
        'id_theme' => array(
            'caption' => 'Тема вопроса',
            'type' => 'foreign',
            'filter' => 'text',
            'hide' => false,
            'is_null' => true,
            'foreign_table' => 'feedback_themes',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'ft',
        ),
	    'id_category' => array(
		    'caption' => 'Тема вопроса',
		    'type' => 'foreign',
		    'filter' => 'text',
		    'hide' => false,
		    'is_null' => true,
		    'foreign_table' => 'feedback_categories',
		    'foreign_key_field' => 'id',
		    'foreign_value_field' => 'title',
		    'alias' => 'fc',
	    ),
        'is_bank_client' => array(
            'caption' => 'Клиент банка',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Неактивен',
                1 => 'Активен',
            ),
        ),
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'readonly',
            'hide' => true,
            'is_sorting' => true,
            'months' => 2
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide' => true,
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