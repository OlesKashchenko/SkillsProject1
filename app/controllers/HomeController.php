<?php

class HomeController extends BaseController
{

	public function doChangeLocale()
	{
		$locale = Input::get('locale');
		LaravelLocalization::setLocale($locale);
		App::setLocale($locale);
		
		Cookie::queue('locale', $locale);

		return Response::json(array(
			'status'    => true,
			'link'      => geturl(Input::get('url'))
		));
	} // end doChangeLocale

	public function showMain()
	{
		$page = $this->node;

		$tree = Collector::get('root');

		$subTree = Tree::getSubTree($tree, $page);

		$blocks = null;
		if ($subTree) {
			$blocks = $subTree->children;
		}

		foreach ($blocks as $index => $block) {
			$blocks[$block->slug] = $block;
			unset($blocks[$index]);
		}

		$allRates = Cache::tags('rates')->rememberForever('rates_'. App::getLocale(), function() {
			return Rates::orderPriority()->get();
		});

		$rates = array();
		foreach ($allRates as $i => $rate) {
			if ($rate['type'] == 1) {
				$rates['departments'][] = $rate;
			} else {
				$rates['cards'][$rate['name_card']][] = $rate;
			}
		}

		$calculatorCredit = new CashCalculator();
		// fixme:
		//$calculatorCredit->setMonthlyIncome(Settings::get('monthly_income_default', 0));
		$calculatorCredit->setCreditAmount(Settings::get('credit_amount_default', 100000));
		$calculatorCredit->setTerm(Settings::get('term_default', 3));

		$calculationsCredit = $calculatorCredit->calculate();

		return View::make(
			'index',
			compact('page', 'blocks', 'rates', 'calculationsCredit')
		);
	}// end ShowMain

	public function doRefreshRates()
	{

		$valCur = array(
			'USD' => 840,
			'EUR' => 978,
			'RUB' => 643
		);

		$idVal = Input::get('id');
		$valCurrency = Input::get('currency');

		$client = new RatesClient("Currency");

		$client->call("getCurrencyRate", array("type" => 0, "currencyId" => $valCur[$valCurrency]));
		$client->getCurrencyRateParse();

		$client->call("getCurrencyRate", array("type" => 1, "currencyId" => $valCur[$valCurrency]));
		$alfaBuy = $client->getCurrencyRateParse();

		$client->call("getCurrencyRate", array("type" => 2, "currencyId" => $valCur[$valCurrency]));
		$alfaSale = $client->getCurrencyRateParse();

		if ($alfaBuy > 0 && $alfaSale > 0) {
			$ratesOld = Rates::where('id', $idVal)->get();
				foreach ($ratesOld as $rate) {
					$saleOld = $rate->sale;
					$buyOld = $rate->buy;
					$updateTime = $rate->updated_at;
	            }
				$saleInequality = $alfaSale - $saleOld;
				$buyInequality = $alfaBuy - $buyOld;

			if (date('Y-m-d', strtotime($updateTime)) != date('Y-m-d')) {
				$ratesNew = Rates::where('id', $idVal)->update(array(
					'sale_old'        => round($saleOld, 2),
					'buy_old'         => round($buyOld, 2),
					'sale_inequality' => round($saleInequality, 2),
					'buy_inequality'  => round($buyInequality, 2),
					'sale'            => round($alfaSale, 2),
					'buy'             => round($alfaBuy, 2)
				));
			}



			if ($ratesNew == "1")  {
				return Response::json(array('status' => true));
			}
		} else {
			return Response::json(array('status' => false));

		}
	} // end doRefreshRates
}
