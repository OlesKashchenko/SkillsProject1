<?php

class CorporateBusinessController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		$sliderItems = Cache::tags('slider_items')->rememberForever('corporate_business_slider_'. App::getLocale(), function() {
			return SliderItem::corporateBusiness()->active()->get();
		});

		$products = Cache::tags('j_tree')->rememberForever('corporate_business_products_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		$partnership = null;
		foreach ($products as $index => $product) {
			if ($product->slug == 'partnership') {
				$partnership = $product;
				unset($products[$index]);
			}
		}

		$news = Cache::tags('news')->rememberForever('corporate_business_news_'. App::getLocale(), function() use ($page) {
			return News::active()
				->byCatalog(Collector::get('idNewsCatalog'))
				->byCategories(Collector::get('idCorporateBusinessCategory'))
				->desc()
				->get();
		});

		return View::make(
			'corporate-business.index',
			compact('page', 'sliderItems', 'products', 'partnership', 'news')
		);
	} // end showIndex

	public function showCatalogFirst()
	{
		$page = $this->node;

		$products = Cache::tags('j_tree')->rememberForever('corporate_business_products_catalog_'. $page->id .'_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		return View::make('corporate-business.catalog_first', compact('page', 'products'));
	} // end showCatalogFirst

	public function showCatalogSecond()
	{
		$page = $this->node;

		$products = Cache::tags('j_tree')->rememberForever('corporate_business_products_catalog_'. $page->id .'_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		return View::make('corporate-business.catalog_second', compact('page', 'products'));
	} // end showCatalogSecond

	public function showSingle()
	{
		$page = $this->node;

		return View::make('corporate-business.single', compact('page'));
	} // end showSingle

	public function showPage()
	{
		$page = $this->node;

		return View::make('corporate-business.page', compact('page'));
	} // end showPage

	public function showBannerPage()
	{
		$page = $this->node;

		return View::make('corporate-business.banner_page', compact('page'));
	} // end showPage
}
