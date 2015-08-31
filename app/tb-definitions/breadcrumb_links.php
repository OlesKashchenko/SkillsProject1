<?php

return array(
    'db' => array(
        'table' => 'breadcrumb_links',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => 10,
            'uri' => '/admin/breadcrumb-links',
        ),
    ),
    'options' => array(

        'caption' => 'Ссылки',
        'ident' => 'breadcrumb-links-container',
        'form_ident' => 'breadcrumb-links-form',
        'table_ident' => 'breadcrumb-links-table',
        'action_url' => '/admin/handle/breadcrumb-links',
        'not_found' => 'NOT FOUND',
        'form_width' => '920px',
    ),
    'cache' => array(
        'tags' => array('breadcrumb_links2tb_tree'),
    ),
    'fields' => array(
        'id' => array(
            'caption' => '#',
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
        'link' => array(
            'caption' => 'Ссылка',
            'type' => 'text'
        ),
        'many2many_nodes' => array(
            'caption'   => 'Связанные разделы',
            'type'      => 'many_to_many',
            'show_type' => 'select2',
            'hide_list' => true,
            'mtm_table'                      => 'breadcrumb_links2tb_tree',
            'mtm_key_field'                  => 'id_link',
            'mtm_external_foreign_key_field' => 'id',
            'mtm_external_key_field'         => 'id_node',
            'mtm_external_value_field'       => 'title',
            'mtm_external_table'             => 'tb_tree',
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
    
    'actions' => array(
        'search' => array(
            'caption' => 'Поиск',
        ),
        'insert' => array(
            'caption' => 'Создать',
            'check' => function() {
                return true;
            }
        ),
        'update' => array(
            'caption' => 'Редактировать',
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