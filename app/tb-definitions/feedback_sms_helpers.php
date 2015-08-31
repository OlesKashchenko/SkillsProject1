<?php

return array(
    'db' => array(
        'table' => 'feedback_sms_helpers',
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
            'uri' => '/admin/feedback-sms-helpers',
        ),
    ),
    'options' => array(
        'caption' => 'SMS коды',
        'ident' => 'feedback-sms-helpers',
        'form_ident' => 'feedback-sms-helpers-form',
        'form_width' => '920px',
        'table_ident' => 'feedback-sms-helpers-table',
        'action_url' => '/admin/handle/feedback-sms-helpers',
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
        'title' => array(
            'caption' => 'Название',
            'type' => 'text',
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Название (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Название (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Название (англ)'
                ),
            )
        ),
        'description' => array(
            'caption' => 'Описание',
            'type' => 'wysiwyg',
            'wysiwyg' => 'redactor',
            'editor-options' => array(
                'replaceDivs' => 'false',
                'removeWithoutAttr' => "['i']",
                'cleanOnPaste' => 'true',
                'removeAttr' =>  "[['table', ['width', 'cellpadding', 'cellspacing', 'valign', 'border', 'class', 'style']], ['col', ['width', 'style']], ['tr', ['valign', 'style', 'height']], ['td', ['width', 'height', 'style', 'valign']], ['p', ['style', 'class', 'align']], ['span', 'style']]",
            ),
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Описание (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Описание (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Описание (англ)'
                ),
            )
        ),
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Активен',
                1 => 'Неактивен',
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