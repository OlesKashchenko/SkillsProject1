<?php

class FinancialController extends BaseController
{

	public function showCatalogFirst()
	{
		$page = $this->node;

		$products = Cache::tags('j_tree')->rememberForever('financial_products_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->active()->catalogItems()->get();
		});

		return View::make('financial.catalog_first', compact('page', 'products'));
	} // end showCatalogFirst

	public function showPage()
	{
		$page = $this->node;

		return View::make('financial.page', compact('page'));
	} // end showPage
}
