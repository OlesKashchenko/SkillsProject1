<?php

class CashCalculator implements iCalculatorInterface
{

	private $settings = array();

	private $monthlyIncome;
	private $creditAmount;
	private $term;

	// todo: calculator specific settings
	// private ...

	private $result = array();


	public function getMonthlyIncome()
	{
		return $this->monthlyIncome;
	}

	public function setMonthlyIncome($income)
	{
		$this->monthlyIncome = $income;
	}

	public function getCreditAmount()
	{
		return $this->creditAmount;
	}

	public function setCreditAmount($amount)
	{
		$this->creditAmount = $amount;
	}

	public function getTerm()
	{
		return $this->term;
	}

	public function setTerm($term)
	{
		$this->term = $term;
	}


	public function __construct()
	{
		$this->settings = Collector::get('calculatorsSettings')['cash'];

		// todo: set calculator specific settings
	} // __construct

	public function calculate()
	{
		if (!$this->getCreditAmount() || !$this->getTerm()) {
			return false;
		}
		
		$rate = 0.0001 / 12 ;
		$x = pow(( 1 + $rate), $this->getTerm());
		$topPart = $this->getCreditAmount() * 0.0001 * $x;
		$bottomPart = 12 * ($x - 1);

		$plt = $topPart / $bottomPart;
		$sum = $plt + $this->getCreditAmount() * 0.0365;


		// todo: process calculations

		$this->result = array(
			'sum'                => round($sum, 2),
			'credit_amount'      => $this->getCreditAmount(),
			'term'               => $this->getTerm(),
			'currency'           => 'uah'
		);
		return $this->result;
	} // end calculate
}
