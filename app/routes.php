<?php

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');

if (file_exists(app_path() .'/routes_dev.php')) {
	include app_path() .'/routes_dev.php';
}

include app_path() .'/routes_backend.php';

include 'view_composers.php';

Route::group(array('prefix' => LaravelLocalization::setLocale()), function()
{
	Route::post('/app/change-locale', 'HomeController@doChangeLocale');
	Route::post('/rates/refresh', 'HomeController@doRefreshRates');

	/* Calculators */
	Route::post('/calculator/refinance', 'CalculatorController@doRefinanceCalculation');
	Route::post('/calculator/consumer', 'CalculatorController@doConsumerCalculation');
	Route::post('/calculator/cash', 'CalculatorController@doCashCalculation');
	Route::post('/calculator/deposit', 'CalculatorController@doDepositCalculation');
	Route::post('/calculator/get-deposit-interest', 'CalculatorController@getDepositInterest');
	/* end Calculators */

	Route::post('/apply-form/product', 'ApplyController@doApplyProduct');
	Route::post('/apply-form/business', 'ApplyController@doApplyBusiness');
	Route::post('/apply-form/deposit', 'ApplyController@doApplyDeposit');

	Route::post('/feedback/send', 'FeedbackController@doSendFeedback');

    Route::post('/apply-form/subscriber', 'ApplyController@doApplySubscriber');

	Route::get('/form-deposit-compare', 'PrivatePersonsController@formDepositCompare');

	Route::get('/about/press/{slug}-{id}', 'AboutController@showSinglePressItem');
	Route::post('/about/press/load', 'AboutController@doLoadPressItems');

	// map
	Route::post('/map/filter', 'MapController@doFilter');

	// async
	Route::post('/async/add-card-to-compare', 'AsyncController@addCardToCompare');
	Route::post('/async/remove-card-from-compare', 'AsyncController@removeCardFromCompare');
	Route::get('/async/form-card-compare', 'AsyncController@formCardCompare');
	Route::post('/async/get-cities-by-region', 'AsyncController@getCitiesByRegion');


	//import from old database
/*	Route::get('/import-news-from-old-site' , function() {

		$unistories = DB::table('news')->where('id_catalog', '964')->where('show_date','!=','')->get();
		foreach ($unistories as $news) {
			DB::table('news')->where('id', $news['id'])->update(
				array(
					'show_date'   => $news['created_at']
				)
			);
		}
	});*/
		/*foreach ($unistories as $newNews) {
			DB::table('news')->insert(
				array(
					'id_catalog' => '967',
					'title_ru'   => $newNews['headline'],
					'text_ru'    => $newNews['story_text'],
					'active'     => $newNews['published'] ? 'ru' : '',
					'created_at' => $newNews['created'],
					'updated_at' => $newNews['modified'],
					'id_remote'  => $newNews['id']
				)
			);
		}*/

		/*foreach ($unistories as $newNews) {
			$translates = DB::table('translate_story')->where('owner',$newNews['id'])->where('lang','ua')->get();
			$translatesNews[$newNews['id']] = $translates;

			foreach($translates as $new)
			DB::table('news')->where('id_remote', $new['owner'])->update(
				array(
					'title'   => $new['headline_lg'],
					'text'    => $new['story_text_lg'],
					'active'  =>   'ru,ua'
				)
			);

	});}*/
});
