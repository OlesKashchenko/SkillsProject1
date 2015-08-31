<?php

return array(
    
    'is_active' => true,

    'model' => 'Tree',

    'node_active_field' => array(
        'field' => 'is_active',
        'options' => array(
            'ua' => 'Укр',
            'ru' => 'Рус',
            'en' => 'Eng',
        ),
    ),

    'templates' => array(
        'Главная страница сайта' => array(
            'type' => 'node',
            'action' => 'HomeController@showMain',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditsCatalog',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты - Каталог карт' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditsCardsCatalog',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты - Карта' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditCard',
            'definition' => '',
            'node_definition' => 'node_card',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты - Потребительский кредит' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditsConsumer',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты - Наличными' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditsCash',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Кредиты - Рефинансирование' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showCreditsRefinance',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Депозиты' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showDepositsCatalog',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Банковские карты' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showBankCardsCatalog',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Платежи и переводы' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showTransfersCatalog',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Частным лицам - Платежи и переводы - Страница продукта' => array(
            'type' => 'node',
            'action' => 'PrivatePersonsController@showTransfer',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Малому бизнесу - Главная' => array(
            'type' => 'node',
            'action' => 'SmallBusinessController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Малому бизнесу - Каталог 1-го уровня' => array(
            'type' => 'node',
            'action' => 'SmallBusinessController@showCatalogFirst',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Малому бизнесу - Каталог 2-го уровня' => array(
            'type' => 'node',
            'action' => 'SmallBusinessController@showCatalogSecond',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Малому бизнесу - Страница продукта' => array(
            'type' => 'node',
            'action' => 'SmallBusinessController@showSingle',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Главная' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Каталог 1-го уровня' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showCatalogFirst',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Каталог 2-го уровня' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showCatalogSecond',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Страница продукта' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showSingle',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Статическая страница' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showPage',
            'definition' => '',
            'node_definition' => 'node_content',
            'check' => function() {
                return true;
            },
        ),
        'Корпоративному бизнесу - Статическая страница(с баннером)' => array(
            'type' => 'node',
            'action' => 'CorporateBusinessController@showBannerPage',
            'definition' => '',
            'node_definition' => 'node_content',
            'check' => function() {
                return true;
            },
        ),
        'Финансовым институтам - Каталог 1-го уровня' => array(
            'type' => 'node',
            'action' => 'FinancialController@showCatalogFirst',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Финансовым институтам - Статическая страница' => array(
            'type' => 'node',
            'action' => 'FinancialController@showPage',
            'definition' => '',
            'node_definition' => 'node_content',
            'check' => function() {
                return true;
            },
        ),
        'О Банке - Главная' => array(
            'type' => 'node',
            'action' => 'AboutController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'О Банке - Пресс-центр' => array(
            'type' => 'table',
            'action' => 'AboutController@showPressList',
            'definition' => 'news',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'О Банке - Плавающий список с текстом' => array(
            'type' => 'node',
            'action' => 'AboutController@showAccordionDescription',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
	    'О Банке - контентная страница(FAQ)' => array(
		    'type' => 'node',
		    'action' => 'AboutController@showStructureContentFaq',
		    'definition' => '',
		    'node_definition' => 'node',
		    'check' => function() {
			    return true;
		    },
	    ),
	    'О Банке - контентная страница' => array(
		    'type' => 'node',
		    'action' => 'AboutController@showStructureContent',
		    'definition' => '',
		    'node_definition' => 'node',
		    'check' => function() {
			    return true;
		    },
	    ),
        'Investor Relations - Главная' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Корпоративное управление' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showCorporate',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Уставные документы' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showDocuments',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Управление рисками' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showRisksManagement',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Руководство' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showLeadership',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Структура собственности' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showStructure',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Investor Relations - Структура корп. управления' => array(
            'type' => 'node',
            'action' => 'InvestorRelationsController@showStructureCorporate',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Страница Отделения и банкоматы' => array(
            'type' => 'node',
            'action' => 'MapController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Страница Обратная связь' => array(
            'type' => 'node',
            'action' => 'FeedbackController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Интернет-банк' => array(
            'type' => 'node',
            'action' => 'BankingController@showIndex',
            'definition' => '',
            'node_definition' => 'node',
            'check' => function() {
                return true;
            },
        ),
        'Контентная страница' => array(
            'type' => 'node',
            'action' => 'ArticleController@showIndex',
            'definition' => '',
            'node_definition' => 'node_content',
            'check' => function() {
                return true;
            },
        ),
        'Контентная страница(Как погашать кредит)' => array(
            'type' => 'node',
            'action' => 'AboutController@showCreditRepay',
            'definition' => '',
            'node_definition' => 'node_content',
            'check' => function() {
                return true;
            },
        ),
        'Информационный блок' => array(
            'type' => 'node',
            'action' => 'HomeController@showMain',
            'definition' => '',
            'node_definition' => 'node_info_block',
            'check' => function() {
                return true;
            },
        ),
        'Информационный блок (таб)' => array(
            'type' => 'node',
            'action' => 'HomeController@showMain',
            'definition' => '',
            'node_definition' => 'node_info_block_tab',
            'check' => function() {
                return true;
            },
        ),
    ),
    
    'default' => array(
        'type' => 'node', 
        'action' => 'HomeController@showPage',
        'definition' => 'node',
        'node_definition' => 'node',
    ),
    
    
    
);
