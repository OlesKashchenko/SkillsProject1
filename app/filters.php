<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{


	if (Request::is('admin/*')) {
		return;
	}

	$root = \Cache::tags(array('jarboe', 'j_tree'))->get('j_tree');

	$current = null;
	foreach($root as $child) {
		if (Request::is(App::getLocale() .'/'. $child->getUrl()) || Request::is($child->getUrl())) {
			$current = $child;
		}
	}

	$footerMenu = array();
	foreach($root as $node) {
		if ($node->isFooterMenu()) {
			$footerMenu[] = array(
				'url'   => $node->getUrl(),
				'title' => $node->t('title')
			);
		}
	}

	Collector::set('footerMenu', $footerMenu);
	Collector::set('flatRoot', $root);

	$root = $root->toHierarchy();

	Collector::set('root', $root);
	Collector::set('current', $current);

	// breadcrumbs and links relations
	if (isset($current) && isset($current->id)) {
		$breadcrumbsEntity = Cache::tags('j_tree')->rememberForever('breadcrumbs_'. $current->id .'_'. App::getLocale(), function() use ($current) {
			return new Breadcrumbs($current);
		});

		Collector::set('breadcrumbs', $breadcrumbsEntity);

		$links = Cache::tags('j_tree', 'breadcrumb_links2tb_tree')->rememberForever('breadcrumb_links2tb_tree_'. $current->id .'_'. App::getLocale(), function() use ($current) {
			$relatedLinksIds = DB::table('breadcrumb_links2tb_tree')->where('id_node', $current->id)->lists('id_link');
			if ($relatedLinksIds) {
				return BreadcrumbLink::whereIn('id', $relatedLinksIds)->get();
			}

			return false;
		});

		Collector::set('breadcrumb_links', $links);
	}

	$calculatorsSettingsAll = Cache::tags('calculator_settings')->rememberForever('calculator_settings', function() {
		return CalculatorSetting::all();
	});

	$calculatorsSettings = array();
	foreach ($calculatorsSettingsAll as $calculatorsSetting) {
		$calculatorsSettings[$calculatorsSetting->type][$calculatorsSetting->name] = $calculatorsSetting->value;
	}

	// supahacks
	Collector::set('idNewsCatalog', 964);
	Collector::set('idSmallBusinessCategory', array(4));
	Collector::set('idCorporateBusinessCategory', array(2));
    Collector::set('idInvestorRelationsCategory', array(7));
	Collector::set('idAboutAchievements', 1179);
	Collector::set('idSmallBusinessDeposits', 45);
	Collector::set('idDepositsCatalog', 210);
	Collector::set('idCardsCatalog', 18);

	Collector::set('calculatorsSettings', $calculatorsSettings);

	// translates
	$translator = \Yaro\Jarboe\Helpers\Translate::getInstance();
	Collector::set('translates', $translator->getAllStatic());
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{

	if (Session::token() != Input::get('_token')) {
		throw new Illuminate\Session\TokenMismatchException;
	}
});
