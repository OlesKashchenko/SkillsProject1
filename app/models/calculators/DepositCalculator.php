<?php

class DepositCalculator implements iCalculatorInterface
{

	private $settings = array();
	private $isMain = true;

	private $depositAmount;
	private $term;
	private $monthlyInstallment;
	private $currency;
	private $interestPaymentType;
	private $interestPaymentPercent;

	// todo: calculator specific settings
	private $percent;
	private $percentMilitary;

	private $depositIds;
	private $result = array();


	public function getIsMain()
	{
		return $this->isMain;
	}

	public function setIsMain($isMain)
	{
		$this->isMain = $isMain;
	}

	public function getDepositAmount()
	{
		return $this->depositAmount;
	}

	public function setDepositAmount($amount)
	{
		$this->depositAmount = $amount;
	}

	public function getTerm()
	{
		return $this->term;
	}

	public function setTerm($term)
	{
		$this->term = $term;
	}

	public function getMonthlyInstallment()
	{
		return $this->monthlyInstallment;
	}

	public function setMonthlyInstallment($value)
	{
		$this->monthlyInstallment = $value;
	}

	public function getCurrency()
	{
		return $this->currency;
	}

	public function setCurrency($currency)
	{
		$this->currency = $currency;
	}

	public function getInterestPaymentType()
	{
		return $this->interestPaymentType;
	}

	public function setInterestPaymentType($type)
	{
		$this->interestPaymentType = $type;
	}

	public function getInterestPaymentPercent()
	{
		return $this->interestPaymentPercent;
	}

	public function setInterestPaymentPercent($percent)
	{
		$this->interestPaymentPercent = $percent;
	}

	public function getPercent()
	{
		return $this->percent;
	}

	public function setPercent($percent)
	{
		$this->percent = $percent;
	}

	public function getPercentMilitary()
	{
		return $this->percentMilitary;
	}

	public function setPercentMilitary($percent)
	{
		$this->percentMilitary = $percent;
	}

	public function getDepositIds()
	{
		return $this->depositIds;
	}

	public function setDepositIds($ids)
	{
		$this->depositIds = $ids;
	}

	public function __construct()
	{
		$this->settings = Collector::get('calculatorsSettings')['deposit'];

		$this->setPercent($this->settings['percent']);
		$this->setPercentMilitary($this->settings['percent_military']);
		$this->setDepositIds(Tree::getDepositsCompared());
	} // __construct

	public function calculate()
	{
		if (!$this->getDepositAmount() || !$this->getTerm() || !$this->getCurrency()) {
			return false;
		}

		if (!$this->getIsMain()) {
			if (!$this->getInterestPaymentType() || !$this->getInterestPaymentPercent()) {
				return false;
			}
		}

		$sum = array();

		if ($this->getIsMain()) {

			$interestPaymentPercent = Cache::tags('deposits')->rememberForever('deposits_max_percent', function() {
				return Deposit::frequency()->currency($this->getCurrency())->max('percent');
			});

			$percentTotal = (100 - ($this->getPercent() + $this->getPercentMilitary())) / 100;
			$sum[0] = (($this->getDepositAmount() * ($interestPaymentPercent / 100)) / 12 * $this->getTerm()) * $percentTotal;

			for ($i = 1; $i <= $this->getTerm() - 1; $i++) {
				$sum[$i] = ((($this->getDepositAmount() + $sum[$i - 1]) * ($interestPaymentPercent / 100)) / 12 * $this->getTerm()) * $percentTotal;
			}

			$sum = round(array_pop($sum), 2);
			$this->result = array(
				'sum'           => $sum,
				'amount'        => $this->getDepositAmount(),
				'installment'   => $this->getMonthlyInstallment(),
				'percent'       => $interestPaymentPercent,
				'currency'      => $this->getCurrency()
			);

		} else {
			
			foreach ($this->getDepositIds() as $key => $value) {
				$percentTotal = (100 - ($this->getPercent() + $this->getPercentMilitary())) / 100;

				if ($this->getInterestPaymentType() == 'capitalize') {

					$interestPaymentPercent = Cache::tags('deposits')->rememberForever('deposits_max_percent', function() {
						return Deposit::frequency()->currency($this->getCurrency())->max('percent');
					});

					$temp = array();

					$temp[0] = (($this->getDepositAmount() * ($interestPaymentPercent / 100)) / 12 * $this->getTerm()) * $percentTotal;

					for ($i = 1; $i <= $this->getTerm() - 1; $i++) {
						$temp[$i] = ((($this->getDepositAmount() + $temp[$i - 1]) * ($interestPaymentPercent / 100)) / 12 * $this->getTerm()) * $percentTotal;
					}

					$sum = round(array_pop($temp), 2);

				} else {
					$sum = (($this->getDepositAmount() * ($this->getInterestPaymentPercent() / 100)) / 12 * $this->getTerm()) * $percentTotal;
				}

				$this->result[$value] = array(
					'bonus'       => 0,
					'percent'     => $this->getInterestPaymentPercent(),
					'sum'         => $sum,
					'amount'      => $this->getDepositAmount(),
					'installment' => $this->getMonthlyInstallment() * $this->getTerm(),
					'term'        => $this->getTerm(),
					'currency'    => $this->getCurrency(),
					'paymentType' =>$this->getInterestPaymentType()
				) ;


			}
		}

		return $this->result;
	} // end calculate
}
