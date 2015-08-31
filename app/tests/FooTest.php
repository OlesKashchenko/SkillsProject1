<?php

class FooTest extends TestCase
{

	private $calculator;


	public function setUp()
	{
		$this->calculator = new DepositCalculator();
	}

	public function testSomethingIsTrue()
	{
		$this->calculator->setDepositAmount(100000);
		$this->calculator->setCurrency('uah');
		$this->calculator->setTerm(3);
		$this->calculator->setMonthlyInstallment(0);
		$this->calculator->setInterestPaymentPercent(24);
		$this->calculator->setInterestPaymentType('end');
		$result = $this->calculator->calculate();
	}

}

