<?php

return array(
    'db' => array(
        'table' => 'news',
        'order' => array(
            'created_at' => 'DESC',
        ),
        'pagination' => array(
            'per_page' => array(
                10 => '10',
                20 => '20',
                50 => '50',
                100 => '100',
                9999999 => 'Все'
            ),
            'uri' => '/admin/news',
        ),
    ),
    'options' => array(
        'caption' => 'Новости',
        'ident' => 'news',
        'form_ident' => 'news-form',
        'form_width' => '920px',
        'table_ident' => 'news-table',
        'action_url' => '/admin/handle/news',
        'not_found' => 'NOT FOUND',
    ),
    'cache' => array(
        'tags' => array('news'),
    ),
    'position' => array(
        'tabs' => array(
            'Общая'     => array(
                'id',
                'title',
                'description',
                'text',
                'show_date',
                'created_at',
                'updated_at',
            ),
            'Изображения'    => array(
                'preview',
                'image',
            ),
            'Связи'    => array(
                'id_catalog',
                'many2many_categories',
            ),
            'Признаки'  => array(
                'active',
                'is_show_main',
                'is_fixed_main',

            ),
            'SEO'    => array(
                'seo_title',
                'seo_description',
                'seo_keywords',
            ),
        )
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
        'id_catalog' => array(
            'caption' => 'Категория',
            'type' => 'foreign',
            'filter' => 'text',
            'foreign_table' => 'tb_tree',
            'foreign_key_field' => 'id',
            'foreign_value_field' => 'title',
            'alias' => 'dt',
            'validation' => array(
                'server' => array(
                    'rules' => 'required',
                    'messages' => array(
                        'required' => 'Обязательно к заполнению',
                    )
                ),
                'client' => array(
                    'rules' => array(
                        'required' => true
                    ),
                    'messages' => array(
                        'required' => 'Обязательно к заполнению'
                    )
                )
            ),
            'additional_where' => array(
                'tb_tree.parent_id' => array(
                    'sign' => '=',
                    'value' => 963
                )
            )
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
            'type' => 'textarea',
            'filter' => 'text',
            'hide_list' => true,
            'rows' => 5,
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
        'text' => array(
            'caption' => 'Содержание',
            'type' => 'wysiwyg',
            'wysiwyg' => 'redactor',
            'editor-options' => array(
                'replaceDivs' => 'false',
                'removeWithoutAttr' => "['i']",
                'cleanOnPaste' => 'true',
                'removeAttr' =>  "[['table', ['width', 'cellpadding', 'cellspacing', 'valign', 'border', 'class', 'style']], ['col', ['width', 'style']], ['tr', ['valign', 'style', 'height']], ['td', ['width', 'height', 'style', 'valign']], ['p', ['style', 'class', 'align']], ['span', 'style']]",
            ),
            'hide_list' => true,
            'filter' => 'text',
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Содержание (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Содержание (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Содержание (англ)'
                ),
            )
        ),
        'preview' => array(
            'caption' => 'Превью',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'image' => array(
            'caption' => 'Изображение',
            'type' => 'image',
            'img_height' => '50px',
            'is_upload' => true,
            'is_remote' => false,
        ),
        'seo_title' => array(
            'caption' => 'Seo: title',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: title (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: title (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: title (англ)'
                ),
            )
        ),
        'seo_description' => array(
            'caption' => 'Seo: description',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: description (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: description (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: description (англ)'
                ),
            )
        ),
        'seo_keywords' => array(
            'caption' => 'Seo: keywords',
            'type' => 'text',
            'filter' => 'text',
            'hide_list' => true,
            'tabs' => array(
                array(
                    'caption' => 'ua',
                    'postfix' => '',
                    'placeholder' => 'Seo: keywords (укр)'
                ),
                array(
                    'caption' => 'ru',
                    'postfix' => '_ru',
                    'placeholder' => 'Seo: keywords (рус)'
                ),
                array(
                    'caption' => 'en',
                    'postfix' => '_en',
                    'placeholder' => 'Seo: keywords (англ)'
                ),
            )
        ),
        'active' => array(
            'caption' => 'Активность',
            'type' => 'set',
            'filter' => 'text',
            'options' => array(
                'ua' => 'укр',
                'ru' => 'рус',
                'en' => 'англ',
            ),
            // test
            'is_inline' => true,
        ),
        'is_show_main' => array(
            'caption' => 'Показывать на главной',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'is_fixed_main' => array(
            'caption' => 'Зафиксировать на главной',
            'type' => 'checkbox',
            'options' => array(
                0 => 'Нет',
                1 => 'Да',
            ),
        ),
        'show_date' => array(
            'caption' => 'Дата для показа',
            'type' => 'datetime',
            'hide_list' => true,
            'is_sorting' => true,
            'months' => 2,
            'default' => 'now',
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
        'many2many_categories' => array(
            'caption'   => 'Подкатегории',
            'type'      => 'many_to_many',
            'show_type' => 'checkbox',
            'divide_columns' => 2,
            'hide_list' => true,
            'mtm_table'                      => 'news2news_categories',
            'mtm_key_field'                  => 'id_new',
            'mtm_external_foreign_key_field' => 'id',
            'mtm_external_key_field'         => 'id_category',
            'mtm_external_value_field'       => 'title',
            'mtm_external_table'             => 'news_categories',
            /*
            'additional_where' => array(
                'tb_tree.parent_id' => array(
                    'sign'  => '=',
                    'value' => 963
                )
            ),
            */
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