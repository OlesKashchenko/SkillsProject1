<?php

class TableAdminController extends BaseController
{
    
    
    public function showSettings()
    {
        $options = array(
            'url'      => '/admin/settings',
            'def_name' => 'settings',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showSettings
    
    public function handleSettings()
    {
        $options = array(
            'url'      => '/admin/settings',
            'def_name' => 'settings',
        );
        return Jarboe::table($options);
    } // end handleSettings  

    public function showMainSlider()
    {
        $options = array(
            'url'      => '/admin/main-slider',
            'def_name' => 'main_slider',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showMainSlider

    public function handleMainSlider()
    {
        $options = array(
            'url'      => '/admin/main-slider',
            'def_name' => 'main_slider',
        );
        return Jarboe::table($options);
    } // end handleMainSlider

    public function showSmallBusinessSlider()
    {
        $options = array(
            'url'      => '/admin/small-business-slider',
            'def_name' => 'small_business_slider',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showSmallBusinessSlider

    public function handleSmallBusinessSlider()
    {
        $options = array(
            'url'      => '/admin/small-business-slider',
            'def_name' => 'small_business_slider',
        );
        return Jarboe::table($options);
    } // end handleSmallBusinessSlider

    public function showCorporateBusinessSlider()
    {
        $options = array(
            'url'      => '/admin/corporate-business-slider',
            'def_name' => 'corporate_business_slider',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCorporateBusinessSlider

    public function handleCorporateBusinessSlider()
    {
        $options = array(
            'url'      => '/admin/corporate-business-slider',
            'def_name' => 'corporate_business_slider',
        );
        return Jarboe::table($options);
    } // end handleCorporateBusinessSlider

    public function showNewsCategories()
    {
        $options = array(
            'url'      => '/admin/news-categories',
            'def_name' => 'news_categories',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showNewsCategories

    public function handleNewsCategories()
    {
        $options = array(
            'url'      => '/admin/news-categories',
            'def_name' => 'news_categories',
        );
        return Jarboe::table($options);
    } // end handleNewsCategories

    public function showNews()
    {
        $options = array(
            'url'      => '/admin/news',
            'def_name' => 'news',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showNews

    public function handleNews()
    {
        $options = array(
            'url'      => '/admin/news',
            'def_name' => 'news',
        );
        return Jarboe::table($options);
    } // end handleNews

    public function showBreadcrumbLinks()
    {
        $options = array(
            'url'      => '/admin/breadcrumb-links',
            'def_name' => 'breadcrumb_links',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showBreadcrumbLinks

    public function handleBreadcrumbLinks()
    {
        $options = array(
            'url'      => '/admin/breadcrumb-links',
            'def_name' => 'breadcrumb_links',
        );
        return Jarboe::table($options);
    } // end handleBreadcrumbLinks

    public function showUsers()
    {
        $options = array(
            'url'    => '/admin/tb/users',
            'def_name' => 'users',
        );

        list($table, $form) = Jarboe::create($options);

        $view = View::make('admin::table')->with('table', $table)->with('form', $form);

        return $view;
    } // end showUsers

    public function handleUsers()
    {
        $options = array(
            'url'    => '/admin/tb/users',
            'def_name' => 'users',
        );

        return Jarboe::create($options);
    } // end handleUsers

    public function showGroups()
    {
        $options = array(
            'url'    => '/admin/tb/groups',
            'def_name' => 'groups',
        );
        list($table, $form) = Jarboe::create($options);

        $view = View::make('admin::table')->with('table', $table)->with('form', $form);

        return $view;
    } // end showGroups

    public function handleGroups()
    {
        $options = array(
            'url'    => '/admin/tb/groups',
            'def_name' => 'groups',
        );
        return Jarboe::create($options);
    } // end handleGroups

    public function showTranslates()
    {
        $options = array(
            'url'    => '/admin/translates',
            'def_name' => 'translates',
        );
        list($table, $form) = Jarboe::create($options);

        $view = View::make('admin::table')->with('table', $table)->with('form', $form);

        return $view;
    } // end showTranslates

    public function handleTranslates()
    {
        $options = array(
            'url'    => '/admin/translates',
            'def_name' => 'translates',
        );
        return Jarboe::create($options);
    } // end handleTranslates

    public function showTree()
    {
        $controller = Jarboe::tree('Tree');
        
        return $controller->handle();
    } // end showTree
    
    public function handleTree()
    {
        $controller = Jarboe::tree('Tree');
        
        return $controller->process();
    } // end handleTree

    public function showApplyForms()
    {
        $options = array(
            'url'      => '/admin/apply-forms',
            'def_name' => 'apply_forms',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyForms

    public function handleApplyForms()
    {
        $options = array(
            'url'      => '/admin/apply-forms',
            'def_name' => 'apply_forms',
        );
        return Jarboe::table($options);
    } // end handleApplyForms

    public function showApplyFormsRefinance()
    {
        $options = array(
            'url'      => '/admin/apply-forms/refinance',
            'def_name' => 'apply_forms_refinance',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsRefinance

    public function handleApplyFormsRefinance()
    {
        $options = array(
            'url'      => '/admin/apply-forms/refinance',
            'def_name' => 'apply_forms_refinance',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsRefinance

    public function showApplyFormsConsumer()
    {
        $options = array(
            'url'      => '/admin/apply-forms/consumer',
            'def_name' => 'apply_forms_consumer',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsConsumer

    public function handleApplyFormsConsumer()
    {
        $options = array(
            'url'      => '/admin/apply-forms/consumer',
            'def_name' => 'apply_forms_consumer',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsConsumer

    public function showApplyFormsCash()
    {
        $options = array(
            'url'      => '/admin/apply-forms/cash',
            'def_name' => 'apply_forms_cash',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsCash

    public function handleApplyFormsCash()
    {
        $options = array(
            'url'      => '/admin/apply-forms/cash',
            'def_name' => 'apply_forms_cash',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsCash

    public function showApplyFormsDeposit()
    {
        $options = array(
            'url'      => '/admin/apply-forms/deposit',
            'def_name' => 'apply_forms_deposit',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsDeposit

    public function handleApplyFormsDeposit()
    {
        $options = array(
            'url'      => '/admin/apply-forms/deposit',
            'def_name' => 'apply_forms_deposit',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsDeposit

    public function showApplyFormsSmallRates()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/rates',
            'def_name' => 'apply_forms_small_rates',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallRates

    public function handleApplyFormsSmallRates()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/rates',
            'def_name' => 'apply_forms_small_rates',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallRates

    public function showApplyFormsSmallRemotes()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/remotes',
            'def_name' => 'apply_forms_small_remotes',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallRemotes

    public function handleApplyFormsSmallRemotes()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/remotes',
            'def_name' => 'apply_forms_small_remotes',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallRemotes

    public function showApplyFormsSmallSalary()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/salary',
            'def_name' => 'apply_forms_small_salary',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallSalary

    public function handleApplyFormsSmallSalary()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/salary',
            'def_name' => 'apply_forms_small_salary',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallSalary

    public function showApplyFormsSmallInetEquiring()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/inet-equiring',
            'def_name' => 'apply_forms_small_inet_equiring',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallInetEquiring

    public function handleApplyFormsSmallInetEquiring()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/inet-equiring',
            'def_name' => 'apply_forms_small_inet_equiring',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallSalary

    public function showApplyFormsSmallLizing()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/lizing',
            'def_name' => 'apply_forms_small_lizing',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallLizing

    public function handleApplyFormsSmallLizing()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/lizing',
            'def_name' => 'apply_forms_small_lizing',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallLizing

    public function showApplyFormsSmallDeposits()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/deposits',
            'def_name' => 'apply_forms_small_deposits',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSmallDeposits

    public function handleApplyFormsSmallDeposits()
    {
        $options = array(
            'url'      => '/admin/apply-forms/small-business/deposits',
            'def_name' => 'apply_forms_small_deposits',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSmallDeposits

    public function showApplyFormsSubscribers()
    {
        $options = array(
            'url'      => '/admin/apply-forms-subscribers',
            'def_name' => 'apply_forms_subscribers',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsSubscribers

    public function handleApplyFormsSubscribers()
    {
        $options = array(
            'url'      => '/admin/apply-forms-subscribers',
            'def_name' => 'apply_forms_subscribers',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsSubscribers

    public function showApplyFormsPartners()
    {
        $options = array(
            'url'      => '/admin/apply-forms-partners',
            'def_name' => 'apply_forms_partners',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showApplyFormsPartners

    public function handleApplyFormsPartners()
    {
        $options = array(
            'url'      => '/admin/apply-forms-partners',
            'def_name' => 'apply_forms_partners',
        );
        return Jarboe::table($options);
    } // end handleApplyFormsPartners

    public function showOccupations()
    {
        $options = array(
            'url'      => '/admin/occupations',
            'def_name' => 'occupations',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showOccupations

    public function handleOccupations()
    {
        $options = array(
            'url'      => '/admin/occupations',
            'def_name' => 'occupations',
        );
        return Jarboe::table($options);
    } // end handleOccupations

    public function showShops()
    {
        $options = array(
            'url'      => '/admin/shops',
            'def_name' => 'shops',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showShops

    public function handleShops()
    {
        $options = array(
            'url'      => '/admin/shops',
            'def_name' => 'shops',
        );
        return Jarboe::table($options);
    } // end handleShops

    public function showProducts()
    {
        $options = array(
            'url'      => '/admin/products',
            'def_name' => 'products',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showProducts

    public function handleProducts()
    {
        $options = array(
            'url'      => '/admin/products',
            'def_name' => 'products',
        );
        return Jarboe::table($options);
    } // end handleProducts

    public function showCashCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/cash',
            'def_name' => 'settings_calculator_cash',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCashCalculatorSettings

    public function handleCashCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/cash',
            'def_name' => 'settings_calculator_cash',
        );
        return Jarboe::table($options);
    } // end handleCashCalculatorSettings

    public function showRefinanceCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/refinance',
            'def_name' => 'settings_calculator_refinance',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showRefinanceCalculatorSettings

    public function handleRefinanceCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/refinance',
            'def_name' => 'settings_calculator_refinance',
        );
        return Jarboe::table($options);
    } // end handleRefinanceCalculatorSettings

    public function showConsumerCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/consumer',
            'def_name' => 'settings_calculator_consumer',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showConsumerCalculatorSettings

    public function handleConsumerCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/consumer',
            'def_name' => 'settings_calculator_consumer',
        );
        return Jarboe::table($options);
    } // end handleConsumerCalculatorSettings

    public function showDepositCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/deposit',
            'def_name' => 'settings_calculator_deposit',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showDepositCalculatorSettings

    public function handleDepositCalculatorSettings()
    {
        $options = array(
            'url'      => '/admin/settings/calculators/deposit',
            'def_name' => 'settings_calculator_deposit',
        );
        return Jarboe::table($options);
    } // end handleDepositCalculatorSettings

    public function showFeedbackForms()
    {
        $options = array(
            'url'      => '/admin/feedback-forms',
            'def_name' => 'feedback_forms',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showFeedbackForms

    public function handleFeedbackForms()
    {
        $options = array(
            'url'      => '/admin/feedback-forms',
            'def_name' => 'feedback_forms',
        );
        return Jarboe::table($options);
    } // end handleFeedbackForms

    public function showFeedbackThemes()
    {
        $options = array(
            'url'      => '/admin/feedback-themes',
            'def_name' => 'feedback_themes',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showFeedbackThemes

    public function handleFeedbackThemes()
    {
        $options = array(
            'url'      => '/admin/feedback-themes',
            'def_name' => 'feedback_themes',
        );
        return Jarboe::table($options);
    } // end handleFeedbackThemes

    public function showFeedbackSmsHelpers()
    {
        $options = array(
            'url'      => '/admin/feedback-sms-helpers',
            'def_name' => 'feedback_sms_helpers',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showFeedbackSmsHelpers

    public function handleFeedbackSmsHelpers()
    {
        $options = array(
            'url'      => '/admin/feedback-sms-helpers',
            'def_name' => 'feedback_sms_helpers',
        );
        return Jarboe::table($options);
    } // end handleFeedbackSmsHelpers

	public function showFeedbackCategories()
	{
		$options = array(
			'url'      => '/admin/feedback-categories',
			'def_name' => 'feedback_categories',
		);
		list($table, $form) = Jarboe::table($options);

		$view = View::make('admin::table', compact('table', 'form'));

		return $view;
	} // end showFeedbackSmsHelpers

	public function handleFeedbackCategories()
	{
		$options = array(
			'url'      => '/admin/feedback-categories',
			'def_name' => 'feedback_categories',
		);
		return Jarboe::table($options);
	} // end handleFeedbackSmsHelpers

	public function showRates()
	{
		$options = array(
			'url'      => '/admin/rates',
			'def_name' => 'rates',
		);
		list($table, $form) = Jarboe::table($options);

		$view = View::make('admin::table', compact('table', 'form'));

		return $view;
	} // end showRates

	public function handleRates()
	{
		$options = array(
			'url'      => '/admin/rates',
			'def_name' => 'rates',
		);

		return Jarboe::table($options);
	} // end handleRates

	public function showRateCards()
	{
		$options = array(
			'url'      => '/admin/rate-cards',
			'def_name' => 'rate-cards',
		);
		list($table, $form) = Jarboe::table($options);

		$view = View::make('admin::table', compact('table', 'form'));

		return $view;
	} // end showRateCards

	public function handleRateCards()
	{
		$options = array(
			'url'      => '/admin/rate-cards',
			'def_name' => 'rate-cards',
		);

		return Jarboe::table($options);
	} // end handleRateCards

    public function showDeposits()
    {
        $options = array(
            'url'      => '/admin/deposits',
            'def_name' => 'deposits',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showDeposits

    public function handleDeposits()
    {
        $options = array(
            'url'      => '/admin/deposits',
            'def_name' => 'deposits',
        );

        return Jarboe::table($options);
    } // end handleDeposits

    public function showDepositApplies()
    {
        $options = array(
            'url'      => '/admin/deposit-applies',
            'def_name' => 'apply_deposit_forms',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showDeposits

    public function handleDepositApplies()
    {
        $options = array(
            'url'      => '/admin/deposit-applies',
            'def_name' => 'apply_deposit_forms',
        );

        return Jarboe::table($options);
    } // end handleDeposits

    public function showCardsCredit()
    {
        $options = array(
            'url'      => '/admin/cards-credit',
            'def_name' => 'cards_credit',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCardsCredit

    public function handleCardsCredit()
    {
        $options = array(
            'url'      => '/admin/cards-credit',
            'def_name' => 'cards_credit',
        );

        return Jarboe::table($options);
    } // end handleCardsCredit

    public function showCardsCategories()
    {
        $options = array(
            'url'      => '/admin/cards-categories',
            'def_name' => 'cards_categories',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCardsCategories

    public function handleCardsCategories()
    {
        $options = array(
            'url'      => '/admin/cards-categories',
            'def_name' => 'cards_categories',
        );

        return Jarboe::table($options);
    } // end handleCardsCategories

    public function showCardsPrograms()
    {
        $options = array(
            'url'      => '/admin/cards-programs',
            'def_name' => 'cards_programs',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCardsPrograms

    public function handleCardsPrograms()
    {
        $options = array(
            'url'      => '/admin/cards-programs',
            'def_name' => 'cards_programs',
        );

        return Jarboe::table($options);
    } // end handleCardsPrograms

    public function showRegions()
    {
        $options = array(
            'url'      => '/admin/regions',
            'def_name' => 'regions',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showRegions

    public function handleRegions()
    {
        $options = array(
            'url'      => '/admin/regions',
            'def_name' => 'regions',
        );

        return Jarboe::table($options);
    } // end handleRegions

    public function showAreas()
    {
        $options = array(
            'url'      => '/admin/areas',
            'def_name' => 'areas',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showAreas

    public function handleAreas()
    {
        $options = array(
            'url'      => '/admin/areas',
            'def_name' => 'areas',
        );

        return Jarboe::table($options);
    } // end handleAreas

    public function showCities()
    {
        $options = array(
            'url'      => '/admin/cities',
            'def_name' => 'cities',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showCities

    public function handleCities()
    {
        $options = array(
            'url'      => '/admin/cities',
            'def_name' => 'cities',
        );

        return Jarboe::table($options);
    } // end handleCities

    public function showOffices()
    {
        $options = array(
            'url'      => '/admin/offices',
            'def_name' => 'offices',
        );
        list($table, $form) = Jarboe::table($options);

        $view = View::make('admin::table', compact('table', 'form'));

        return $view;
    } // end showOffices

    public function handleOffices()
    {
        $options = array(
            'url'      => '/admin/offices',
            'def_name' => 'offices',
        );

        return Jarboe::table($options);
    } // end handleOffices
}
