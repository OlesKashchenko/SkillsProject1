<?php

class CreditCalculator implements iCalculatorInterface
{

	private $sum;
	private $batch;
	private $coefficient;


	public function getSum()
	{
		return $this->sum;
	}

	public function setSum($sum)
	{
		$this->sum = $sum;
	}

	public function getBatch()
	{
		return $this->batch;
	}

	public function setBatch($batch)
	{
		$this->batch = $batch;
	}

	public function getCoefficient()
	{
		return $this->coefficient;
	}

	public function setCoefficient($coefficient)
	{
		$this->coefficient = $coefficient;
	}

	public function __construct()
	{
		$this->setCoefficient(Settings::get('coefficient', 100));
	} // __construct

	public function calculate()
	{
		if (!$this->getSum() || !$this->getBatch()) {
			return false;
		}

		$l1 = $this->getCoefficient() / 100;
		$mPer = $l1 / 12;
		$pow = pow((1 + $mPer), $this->getBatch());
		$k = $mPer * $pow / ($pow - 1);
		$result = round(($k * $this->getSum()), 1);

		return $result;
	} // end calculate
}
