<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RegularImportRatesCommand extends Command{

	protected $name = 'import:rates';
	protected $description = 'regular import';

	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
		$valCur = array(
			'6' => 840, //USD
			'9' => 978, //EUR
			'4' => 643  //RUB
		);

		foreach ($valCur as $key => $value) {
			$client = new RatesClient("Currency");

			$client->call(
				"getCurrencyRate",
				array(
					"type" => 0,
					"currencyId" => $value
				)
			);
			$client->getCurrencyRateParse();

			$client->call(
				"getCurrencyRate",
				array(
					"type" => 1,
					"currencyId" => $value
				)
			);
			$alfaBuy = $client->getCurrencyRateParse();

			$client->call(
				"getCurrencyRate",
				array(
					"type" => 2,
					"currencyId" => $value
				)
			);
			$alfaSale = $client->getCurrencyRateParse();

			if ($alfaBuy > 0 && $alfaSale > 0) {
				$ratesOld = Rates::where('id', $key)->get();
				foreach ($ratesOld as $rate) {
					$saleOld = $rate->sale;
					$buyOld = $rate->buy;
					$updateTime = $rate->updated_at;
				}

				$saleInequality = round($alfaSale,2) - round($saleOld,2);
				$buyInequality = round($alfaBuy,2) - round($buyOld,2);
				if (date('Y-m-d', strtotime($updateTime)) != date('Y-m-d')) {
					Rates::where('id', $key)->update(array(
						'sale_old' => round($saleOld, 2),
						'buy_old' => round($buyOld, 2),
						'sale_inequality' => round($saleInequality, 2),
						'buy_inequality' => round($buyInequality, 2),
						'sale' => round($alfaSale, 2),
						'buy' => round($alfaBuy, 2),
					));
				}
			}
		}
	} // end fire()
}
