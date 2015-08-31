<?php

Route::group(array(
    'prefix' => Config::get('jarboe::admin.uri'), 
    'before' => array(
        'auth_admin', 
        'check_permissions'
    )
), function () {
    
    Route::any('/tree', 'TableAdminController@showTree');
    Route::any('/handle/tree', 'TableAdminController@handleTree');

    Route::get('/main-slider', 'TableAdminController@showMainSlider');
    Route::post('/handle/main-slider', 'TableAdminController@handleMainSlider');

    Route::get('/news-categories', 'TableAdminController@showNewsCategories');
    Route::post('/handle/news-categories', 'TableAdminController@handleNewsCategories');
    Route::get('/news', 'TableAdminController@showNews');
    Route::post('/handle/news', 'TableAdminController@handleNews');

    Route::get('/small-business-slider', 'TableAdminController@showSmallBusinessSlider');
    Route::post('/handle/small-business-slider', 'TableAdminController@handleSmallBusinessSlider');

    Route::get('/corporate-business-slider', 'TableAdminController@showCorporateBusinessSlider');
    Route::post('/handle/corporate-business-slider', 'TableAdminController@handleCorporateBusinessSlider');

    Route::get('/breadcrumb-links', 'TableAdminController@showBreadcrumbLinks');
    Route::post('/handle/breadcrumb-links', 'TableAdminController@handleBreadcrumbLinks');

    Route::get('/settings', 'TableAdminController@showSettings');
    Route::post('/handle/settings', 'TableAdminController@handleSettings');

    Route::get('/translates', 'TableAdminController@showTranslates');
    Route::post('/handle/translates', 'TableAdminController@handleTranslates');

    //Route::get('/apply-forms', 'TableAdminController@showApplyForms');
    //Route::post('/handle/apply-forms', 'TableAdminController@handleApplyForms');

    /* private persons */
    Route::get('/apply-forms/refinance', 'TableAdminController@showApplyFormsRefinance');
    Route::post('/handle/apply-forms/refinance', 'TableAdminController@handleApplyFormsRefinance');
    Route::get('/apply-forms/consumer', 'TableAdminController@showApplyFormsConsumer');
    Route::post('/handle/apply-forms/consumer', 'TableAdminController@handleApplyFormsConsumer');
    Route::get('/apply-forms/cash', 'TableAdminController@showApplyFormsCash');
    Route::post('/handle/apply-forms/cash', 'TableAdminController@handleApplyFormsCash');
    Route::get('/apply-forms/deposit', 'TableAdminController@showApplyFormsDeposit');
    Route::post('/handle/apply-forms/deposit', 'TableAdminController@handleApplyFormsDeposit');

    /* small business */
    Route::get('/apply-forms/small-business/rates', 'TableAdminController@showApplyFormsSmallRates');
    Route::post('/handle/apply-forms/small-business/rates', 'TableAdminController@handleApplyFormsSmallRates');
    Route::get('/apply-forms/small-business/remotes', 'TableAdminController@showApplyFormsSmallRemotes');
    Route::post('/handle/apply-forms/small-business/remotes', 'TableAdminController@handleApplyFormsSmallRemotes');
    Route::get('/apply-forms/small-business/salary', 'TableAdminController@showApplyFormsSmallSalary');
    Route::post('/handle/apply-forms/small-business/salary', 'TableAdminController@handleApplyFormsSmallSalary');
    Route::get('/apply-forms/small-business/inet-equiring', 'TableAdminController@showApplyFormsSmallInetEquiring');
    Route::post('/handle/apply-forms/small-business/inet-equiring', 'TableAdminController@handleApplyFormsSmallInetEquiring');
    Route::get('/apply-forms/small-business/lizing', 'TableAdminController@showApplyFormsSmallLizing');
    Route::post('/handle/apply-forms/small-business/lizing', 'TableAdminController@handleApplyFormsSmallLizing');
    Route::get('/apply-forms/small-business/deposits', 'TableAdminController@showApplyFormsSmallDeposits');
    Route::post('/handle/apply-forms/small-business/deposits', 'TableAdminController@handleApplyFormsSmallDeposits');

    /* other forms */
    Route::get('/apply-forms-partners', 'TableAdminController@showApplyFormsPartners');
    Route::post('/handle/apply-forms-partners', 'TableAdminController@handleApplyFormsPartners');
    Route::get('/occupations', 'TableAdminController@showOccupations');
    Route::post('/handle/occupations', 'TableAdminController@handleOccupations');
    Route::get('/shops', 'TableAdminController@showShops');
    Route::post('/handle/shops', 'TableAdminController@handleShops');
    Route::get('/products', 'TableAdminController@showProducts');
    Route::post('/handle/products', 'TableAdminController@handleProducts');

    /* Calculators */
    Route::get('/settings/calculators/cash', 'TableAdminController@showCashCalculatorSettings');
    Route::post('/handle/settings/calculators/cash', 'TableAdminController@handleCashCalculatorSettings');
    Route::get('/settings/calculators/refinance', 'TableAdminController@showRefinanceCalculatorSettings');
    Route::post('/handle/settings/calculators/refinance', 'TableAdminController@handleRefinanceCalculatorSettings');
    Route::get('/settings/calculators/consumer', 'TableAdminController@showConsumerCalculatorSettings');
    Route::post('/handle/settings/calculators/consumer', 'TableAdminController@handleConsumerCalculatorSettings');
    Route::get('/settings/calculators/deposit', 'TableAdminController@showDepositCalculatorSettings');
    Route::post('/handle/settings/calculators/deposit', 'TableAdminController@handleDepositCalculatorSettings');
    /* end Calculators */

    Route::get('/apply-forms-subscribers', 'TableAdminController@showApplyFormsSubscribers');
    Route::post('/handle/apply-forms-subscribers', 'TableAdminController@handleApplyFormsSubscribers');

    Route::get('/feedback-forms', 'TableAdminController@showFeedbackForms');
    Route::post('/handle/feedback-forms', 'TableAdminController@handleFeedbackForms');
    Route::get('/feedback-themes', 'TableAdminController@showFeedbackThemes');
    Route::post('/handle/feedback-themes', 'TableAdminController@handleFeedbackThemes');
    Route::get('/feedback-sms-helpers', 'TableAdminController@showFeedbackSmsHelpers');
    Route::post('/handle/feedback-sms-helpers', 'TableAdminController@handleFeedbackSmsHelpers');
	Route::get('/feedback-categories', 'TableAdminController@showFeedbackCategories');
	Route::post('/handle/feedback-categories', 'TableAdminController@handleFeedbackCategories');

	Route::get('/rates', 'TableAdminController@showRates');
	Route::post('/handle/rates', 'TableAdminController@handleRates');
	Route::get('/rate-cards', 'TableAdminController@showRateCards');
	Route::post('/handle/rate-cards', 'TableAdminController@handleRateCards');

    Route::get('/deposits', 'TableAdminController@showDeposits');
    Route::post('/handle/deposits', 'TableAdminController@handleDeposits');
    Route::get('/deposit-applies', 'TableAdminController@showDepositApplies');
    Route::post('/handle/deposit-applies', 'TableAdminController@handleDepositApplies');

    Route::get('/cards-credit', 'TableAdminController@showCardsCredit');
    Route::post('/handle/cards-credit', 'TableAdminController@handleCardsCredit');
    Route::get('/cards-categories', 'TableAdminController@showCardsCategories');
    Route::post('/handle/cards-categories', 'TableAdminController@handleCardsCategories');
    Route::get('/cards-programs', 'TableAdminController@showCardsPrograms');
    Route::post('/handle/cards-programs', 'TableAdminController@handleCardsPrograms');

    // offices
    Route::get('/offices-import', 'BackendOfficesController@showOfficesImport');
    Route::post('/handle/offices-import', 'BackendOfficesController@handleOfficesImport');
    Route::get('/regions', 'TableAdminController@showRegions');
    Route::post('/handle/regions', 'TableAdminController@handleRegions');
    Route::get('/areas', 'TableAdminController@showAreas');
    Route::post('/handle/areas', 'TableAdminController@handleAreas');
    Route::get('/cities', 'TableAdminController@showCities');
    Route::post('/handle/cities', 'TableAdminController@handleCities');
    Route::get('/offices', 'TableAdminController@showOffices');
    Route::post('/handle/offices', 'TableAdminController@handleOffices');

    // users
    Route::get('/tb/users', 'TableAdminController@showUsers');
    Route::post('/handle/users', 'TableAdminController@handleUsers');
    Route::get('/tb/groups', 'TableAdminController@showGroups');
    Route::post('/handle/groups', 'TableAdminController@handleGroups');

    Route::get('tb/users/{id}', 'BackendUsersController@showEditUser')->where('id', '[0-9]+');
    Route::post('tb/users/update', 'BackendUsersController@doUpdateUser');
    Route::get('tb/users/create', 'BackendUsersController@showCreateUser');
    Route::post('tb/users/do-create', 'BackendUsersController@doCreateUser');
    Route::get('tb/groups/{id}', 'BackendUsersController@showEditGroup')->where('id', '[0-9]+');
    Route::post('tb/groups/update', 'BackendUsersController@doUpdateGroup');
    Route::get('tb/groups/create', 'BackendUsersController@showCreateGroup');
    Route::post('tb/groups/do-create', 'BackendUsersController@doCreateGroup');
    Route::post('tb/users/upload-image', 'BackendUsersController@doUploadImage');
    // end users
});

