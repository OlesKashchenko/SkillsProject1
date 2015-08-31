<?php

class CalculatorController extends BaseController
{

	public function doRefinanceCalculation()
	{   App::setLocale(Cookie::get('locale', 'ua'));
		$monthlyPayment = intval(trim(Input::get('monthly_payment')));
		$monthsLeft = intval(trim(Input::get('months_left')));
		$costLeft = intval(trim(Input::get('cost_left')));
		$isCard = intval(trim(Input::get('is_card')));

		if (!$monthlyPayment || !$monthsLeft || !$costLeft) {
			return Response::json(array('status' => false));
		}

		$calculator = new RefinanceCalculator();
		$calculator->setMonthlyPayment($monthlyPayment);
		$calculator->setMonthsLeft($monthsLeft);
		$calculator->setCostLeft($costLeft);
		$calculator->setIsCard($isCard);
		$result = $calculator->calculate();

		$html = View::make(
			'partials.calculators.partials.refinance_table',
			array('result' => $result)
		)->render();

		return Response::json(array(
			'status' => true,
			'html' => $html,
		));
	} // end doRefinanceCalculation

	public function doConsumerCalculation()
	{   App::setLocale(Cookie::get('locale', 'ru'));
		$productPrice = intval(trim(Input::get('product_price')));
		$creditTerm = intval(trim(Input::get('credit_term')));

		if (!$productPrice || !$creditTerm) {
			return Response::json(array('status' => false));
		}

		$calculator = new ConsumerCalculator();
		$calculator->setProductPrice($productPrice);
		$calculator->setCreditTerm($creditTerm);
		$result = $calculator->calculate();

		$html = View::make(
			'partials.calculators.partials.consumer_table',
			array('result' => $result)
		)->render();

		return Response::json(array(
			'status' => true,
			'html' => $html,
		));
	} // end doConsumerCalculation

	public function doCashCalculation()
	{   App::setLocale(Cookie::get('locale', 'ru'));
		$creditAmount = intval(trim(Input::get('credit_amount')));
		$term = intval(trim(Input::get('term')));

		if (!$creditAmount || !$term) {
			return Response::json(array('status' => false));
		}

		$calculator = new CashCalculator();
		$calculator->setCreditAmount($creditAmount);
		$calculator->setTerm($term);

		$calculationsCredit = $calculator->calculate();

		$html = View::make('partials.calculators.partials.cash_table', compact('calculationsCredit'))->render();

		return Response::json(array(
			'status' => true,
			'html' => $html,
		));
	} // end doCashCalculation

	public function doDepositCalculation()
	{   App::setLocale(Cookie::get('locale', 'ru'));
		$isMain = intval(Input::get('is_main'));
		$depositAmount = intval(trim(Input::get('deposit_amount')));
		$term = intval(trim(Input::get('term')));
		$monthlyInstallment = intval(trim(Input::get('monthly_installment')));
		$currency = trim(Input::get('currency'));
		$interestPaymentType = trim(Input::get('interest_payment_type'));
		$interestPaymentPercent = trim(Input::get('interest_payment_percent'));

		if (!$depositAmount || !$term || !$currency) {
			return Response::json(array('status' => false));
		}

		$calculator = new DepositCalculator();
		$calculator->setDepositAmount($depositAmount);
		$calculator->setTerm($term);
		$calculator->setMonthlyInstallment($monthlyInstallment);
		$calculator->setCurrency($currency);

		$viewTemplate = 'partials.calculators.partials.deposit_table_main';

		$sliderHtml = '';

		if (!$isMain) {
			$calculator->setInterestPaymentType($interestPaymentType);
			$calculator->setInterestPaymentPercent($interestPaymentPercent);
			$calculator->setIsMain(false);

			$viewTemplate = 'partials.calculators.partials.deposit_table';
		}

		$calculations = $calculator->calculate();

		if (!$isMain) {
			$depositsIds = Tree::getDepositsCompared();

			$depositsCatalog = Cache::tags('j_tree')->rememberForever('deposits_catalog_'. App::getLocale(), function() {
				return Tree::find(Collector::get('idDepositsCatalog'));
			});

			$deposits = Cache::tags('j_tree')->rememberForever('deposits_products_'. App::getLocale(), function() use ($depositsCatalog) {
				return $depositsCatalog->children()->get();
			});

			$deposits = Tree::filterDepositsByIds($deposits, $depositsIds);

			$allDeposits = Cache::tags('deposits')->rememberForever('deposits_'. App::getLocale(), function() {
				return Deposit::all();
			});

			$depositOptionsGroups = Deposit::prepareData($allDeposits);

			$sliderHtml = View::make(
				'private-persons.deposits.partials.deposits_slider',
				compact('deposits', 'depositOptionsGroups', 'calculations')
			)->render();
		}

		$html = View::make(
			$viewTemplate,
			compact('result', 'currency', 'calculations')
		)->render();

		$firstDepositData = array();
		if ($calculations) {
			$firstDepositData = array_values($calculations)[0];
		}

		return Response::json(array(
			'status'        => true,
			'html'          => $html,
			'slider_html'   => $sliderHtml,
			'currency'      => isset($calculations['currency']) ? $calculations['currency'] : '',
			'result'        => isset($calculations['sum']) ? $calculations['sum'] : '',
			'sum'           => $firstDepositData['sum'],
		));
	} // end doDepositCalculation

	public function getDepositInterest()
	{   App::setLocale(Cookie::get('locale', 'ru'));
		$depositAmount = intval(trim(Input::get('deposit_amount')));
		$term = intval(trim(Input::get('term')));
		$monthlyInstallment = intval(trim(Input::get('monthly_installment')));
		$currency = trim(Input::get('currency'));

		if (!$depositAmount || !$term || !$currency) {
			return Response::json(array('status' => false));
		}

		if (!in_array($term, array(1, 2, 3, 4, 5, 6, 7, 12))) {
			$term = 0;
		}

		$filteredDepositEntities = Deposit::amount($depositAmount)
			->terms(array(0, $term))
			->monthly($monthlyInstallment)
			->currency($currency)
			->get();

		$filteredDepositEntitiesIds = array();
		foreach ($filteredDepositEntities as $filteredDepositEntity) {
			$filteredDepositEntitiesIds[] = $filteredDepositEntity->id_tb_tree;
		}

		Tree::setDepositsCompared($filteredDepositEntitiesIds);
		$maxPercents = Deposit::prepareMaxPercents($filteredDepositEntities);

		$html = View::make(
			'private-persons.deposits.partials.redemptions',
			compact('maxPercents')
		)->render();

		return Response::json(array(
			'status'            => true,
			'html'              => $html,
			'max_percent'       => $maxPercents['max_percent'],
			'max_percent_type'  => $maxPercents['max_percent_type'],
		));
	} // end getDepositInterest
}
