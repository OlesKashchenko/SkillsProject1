<?php

class BankingController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		return View::make('banking.index', compact('page'));
	}
}
