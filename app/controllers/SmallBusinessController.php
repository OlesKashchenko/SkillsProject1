<?php

class SmallBusinessController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		$sliderItems = Cache::tags('slider_items')->rememberForever('small_business_slider_'. App::getLocale(), function() {
			return SliderItem::smallBusiness()->active()->get();
		});

		$products = Cache::tags('j_tree')->rememberForever('small_business_products_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		$partnership = null;
		foreach ($products as $index => $product) {
			if ($product->slug == 'partnership') {
				$partnership = $product;
				unset($products[$index]);
			}
		}

		$news = Cache::tags('news')->rememberForever('small_business_news_'. App::getLocale(), function() use ($page) {
			return News::active()
				->byCatalog(Collector::get('idNewsCatalog'))
				->byCategories(Collector::get('idSmallBusinessCategory'))
				->desc()
				->get();
		});

		return View::make(
			'small-business.index',
			compact('page', 'sliderItems', 'products', 'partnership', 'news')
		);
	} // end showIndex

	public function showCatalogFirst()
	{
		$page = $this->node;

		$products = Cache::tags('j_tree')->rememberForever('small_business_products_catalog_'. $page->id .'_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		return View::make('small-business.catalog_first', compact('page', 'products'));
	} // end showCatalogFirst

	public function showCatalogSecond()
	{
		$page = $this->node;

		$products = Cache::tags('j_tree')->rememberForever('small_business_products_catalog_'. $page->id .'_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->where('is_active', 'like', '%'. App::getLocale() .'%')->get();
		});

		return View::make('small-business.catalog_second', compact('page', 'products'));
	} // end showCatalogSecond

	public function showSingle()
	{
		$page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            $blocks = $subTree->children;
        }

		return View::make('small-business.single', compact('page', 'blocks'));
	} // end showSingle
}
