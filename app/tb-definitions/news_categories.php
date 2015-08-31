<?php

return array(
    'db' => array(
        'table' => 'news_categories',
        'order' => array(
            'id' => 'ASC',
        ),
        'pagination' => array(
            'per_page' => 10,
            'uri' => '/admin/news-categories',
        ),
    ),
    
    'options' => array(
        'caption' => 'Категории новостей',
        'ident' => 'news-categories-container',
        'form_ident' => 'news-categories-form',
        'table_ident' => 'news-categories-table',
        'action_url' => '/admin/handle/news-categories',
        'not_found' => 'NOT FOUND',
        'form_width' => '920px',
    ),
    'cache' => array(
        'tags' => array('news_categories'),
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
        'is_active' => array(
            'caption' => 'Активность',
            'type' => 'checkbox',
            'filter' => 'text',
            'options' => array(
                0 => 'Неактивен',
                1 => 'Активен',
            ),
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
        'many2many_node' => array(
            'caption'   => 'Связанные разделы',
            'type'      => 'many_to_many',
            'show_type' => 'checkbox',
            'divide_columns' => 2,
            'hide_list' => true,
            'mtm_table'                      => 'news_categories2tb_tree',
            'mtm_key_field'                  => 'id_category',
            'mtm_external_foreign_key_field' => 'id',
            'mtm_external_key_field'         => 'id_node',
            'mtm_external_value_field'       => 'title',
            'mtm_external_table'             => 'tb_tree',
            'additional_where' => array(
                'tb_tree.parent_id' => array(
                    'sign'  => '=',
                    'value' => 963
                )
            ),
        ),
    ),

    'filters' => array(

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