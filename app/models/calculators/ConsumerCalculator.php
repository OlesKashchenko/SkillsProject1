<?php

class ConsumerCalculator implements iCalculatorInterface
{

	private $settings = array();

	private $productPrice;
	private $creditTerm;

	private $percent;

	private $result = array();


	public function getProductPrice()
	{
		return $this->productPrice;
	}

	public function setProductPrice($price)
	{
		$this->productPrice = $price;
	}

	public function getCreditTerm()
	{
		return $this->creditTerm;
	}

	public function setCreditTerm($term)
	{
		$this->creditTerm = $term;
	}

	public function getPercent()
	{
		return $this->percent;
	}

	public function setPercent($percent)
	{
		$this->percent = $percent;
	}


	public function __construct()
	{
		$this->settings = Collector::get('calculatorsSettings')['consumer'];

		$this->setPercent($this->settings['percent']);
	} // __construct

	public function calculate()
	{
		if (!$this->getProductPrice() || !$this->getCreditTerm()) {
			return false;
		}

		$monthlyPayment = $this->getProductPrice() / $this->getCreditTerm() + $this->getProductPrice() * ($this->getPercent() / 100) + 20;

		$this->result = array(
			'sum'       => $this->getProductPrice(),
			'term'      => $this->getCreditTerm(),
			'payment'   => round($monthlyPayment),
		);

		return $this->result;
	} // end calculate
}
