<?php

class RefinanceCalculator implements iCalculatorInterface
{

	private $settings = array();

	private $monthlyPayment;
	private $monthsLeft;
	private $costLeft;
	private $isCard = false;

	private $base;
	private $monthlyCommisionSmall;
	private $monthlyCommisionBig;
	private $insuranceCoefficient;

	private $terms = array(6, 12, 24, 36, 48, 60);
	private $result = array();


	public function getMonthlyPayment()
	{
		return $this->monthlyPayment;
	}

	public function setMonthlyPayment($payment)
	{
		$this->monthlyPayment = $payment;
	}

	public function getMonthsLeft()
	{
		return $this->monthsLeft;
	}

	public function setMonthsLeft($left)
	{
		$this->monthsLeft = $left;
	}

	public function getCostLeft()
	{
		return $this->costLeft;
	}

	public function setCostLeft($left)
	{
		$this->costLeft = $left;
	}

	public function getIsCard()
	{
		return $this->isCard;
	}

	public function setIsCard($isCard = false)
	{
		$this->isCard = $isCard;
	}

	public function getInsuranceCoefficient()
	{
		return $this->insuranceCoefficient;
	}

	public function setInsuranceCoefficient($coef)
	{
		$this->insuranceCoefficient = $coef;
	}

	public function getMonthlyCommisionSmall()
	{
		return $this->monthlyCommisionSmall;
	}

	public function setMonthlyCommisionSmall($commision)
	{
		$this->monthlyCommisionSmall = $commision;
	}

	public function getMonthlyCommisionBig()
	{
		return $this->monthlyCommisionBig;
	}

	public function setMonthlyCommisionBig($commision)
	{
		$this->monthlyCommisionBig = $commision;
	}

	public function getBase()
	{
		return $this->base;
	}

	public function setBase($base)
	{
		$this->base = $base;
	}

	public function __construct()
	{
		$this->settings = Collector::get('calculatorsSettings')['refinance'];

		$this->setBase($this->settings['base']);
		$this->setMonthlyCommisionSmall($this->settings['monthly_commision_small']);
		$this->setMonthlyCommisionBig($this->settings['monthly_commision_big']);
		$this->setInsuranceCoefficient($this->settings['insurance_coefficient']);
	} // __construct

	public function calculate()
	{
		if (!$this->getMonthlyPayment() || !$this->getMonthsLeft() || !$this->getCostLeft()) {
			return false;
		}

		if (!$this->getIsCard()) {

			$monthlyInsurance = $this->getCostLeft() * $this->getInsuranceCoefficient();

			foreach ($this->terms as $term) {

				if ($term < $this->getMonthsLeft()) {
					$this->result[$term] = array(
						'term'      => $term,
						'sum'       => '',
						'payment'   => '',
					);

					continue;
				}

				$newSum = $this->getCostLeft() + $monthlyInsurance * $term;

				if ($newSum <= 50000) {
					$monthlyCommision = $this->getMonthlyCommisionSmall();
				} else {
					$monthlyCommision = $this->getMonthlyCommisionBig();
				}

				$monthlyPayment = $this->plt($this->getBase() / 12, $term, (-1) * $newSum) + $newSum * $monthlyCommision;

				$this->result[$term] = array(
					'term'      => $term,
					'sum'       => $this->getCostLeft(),
					'payment'   => round($monthlyPayment),
				);
			}

		} else {
			if ($this->getCostLeft() <= 50000) {
				$monthlyCommision = $this->getMonthlyCommisionSmall();
			} else {
				$monthlyCommision = $this->getMonthlyCommisionBig();
			}

			$monthlyPayment = $this->plt($this->getBase() / 12, $this->getMonthsLeft(), (-1) * $this->getCostLeft()) + $this->getCostLeft() * $monthlyCommision;

			$first = true;
			foreach ($this->terms as $term) {
				if ($first) {
					$this->result[$this->getMonthsLeft()] = array(
						'term'      => $this->getMonthsLeft(),
						'sum'       => $this->getCostLeft(),
						'payment'   => round($monthlyPayment),
					);

					$first = false;

				} else {
					$this->result[$term] = array(
						'term'      => '',
						'sum'       => '',
						'payment'   => '',
					);
				}
			}
		}

		return $this->result;
	} // end calculate

	private function plt($base, $term, $sum)
	{
		return  $base * $sum * pow(1 + $base, $term) / (1 - pow(1 + $base, $term));
	} // end plt
}
