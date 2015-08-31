<?php

class AboutController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		$tree = Collector::get('root');

		$subTree = Tree::getSubTree($tree, $page);

		$blocks = null;
		if ($subTree) {
			$blocks = $subTree->children;
		}

		foreach ($blocks as $index => $block) {
			$blocks[$block->slug] = $block;
			unset($blocks[$index]);
		}

		if(isset($blocks['reporting'])){
			$blocks['reporting']->children = $blocks['reporting']->children->reverse();
			$reporting = $blocks['reporting'];
		}

		$flatArticles = Cache::tags('j_tree')->rememberForever('about_flat_articles_'. App::getLocale(), function() use ($page) {
			return $page->immediateDescendants()->active()->get();
		});

		$articles = array();
		foreach ($flatArticles as $article) {
			$articles[$article->slug] = $article;
		}

		$pressSections = null;
		if (isset($articles['press']) && $articles['press']->count()) {
			$pressSubTree = Tree::getSubTree($tree, $articles['press']);
			if ($pressSubTree) {
				$pressSections = $pressSubTree->children;
			}
		}

		return View::make(
			'about.index',
			compact('page', 'reporting', 'articles', 'pressSections')
		);
	} // end showIndex

	public function showPressList()
	{
		$page = $this->node;
		if (!$page->isActive()) {
			App::abort(404);
		}

		$filters = Input::all();

		$perPage = Settings::get('news_per_page', 6);

		$sections = $page->siblingsAndSelf()->with('newsCategories')->active()->get();

		$total = News::active()
			->byCatalog($page->slug != 'all' ? $page->id : '')
			->byYear(isset($filters['year']) ? $filters['year'] : '')
			->byCategories(isset($filters['categories']) ? $filters['categories'] : array())
			->count();

		$news = News::active()
			->byCatalog($page->slug != 'all' ? $page->id : '')
			->byYear(isset($filters['year']) ? $filters['year'] : '')
			->byCategories(isset($filters['categories']) ? $filters['categories'] : array())
			->desc()
			->skip(0)
			->limit($perPage)
			->get();

		return View::make(
			'about.press.list',
			compact('page', 'sections', 'news', 'total', 'perPage', 'filters')
		);
	} // end showPressList

	public function showSinglePressItem($slug, $id)
	{
		$pressItem = News::with('catalog')->find($id);
		if (!$pressItem || !$pressItem->isActive() || $pressItem->getSlug() != $slug) {
			App::abort(404);
		}

		$previousPressItemId = News::active()->where('id', '<', $pressItem->id)->max('id');
		$previousPressItem = News::find($previousPressItemId);

		$nextPressItemId = News::active()->where('id', '>', $pressItem->id)->min('id');
		$nextPressItem = News::find($nextPressItemId);

		return View::make('about.press.single', compact('pressItem', 'previousPressItem', 'nextPressItem'));
	} // end showSinglePressItem

	public function doLoadPressItems()
	{
		if (!Request::ajax()) {
			return Response::json(array('status' => false));
		}

		$idCatalog = Input::get('id_catalog');
		$skip = Input::get('skip');

		if (!$idCatalog || !$skip) {
			return Response::json(array('status' => false));
		}

		$year = Input::get('year');
		$categories = Input::get('categories');
		$perLoad = Settings::get('news_per_load', 3);

		$total = News::active()
			->byCatalog($idCatalog == 969 ? '' : $idCatalog)
			->byYear($year ? : '')
			->byCategories($categories ? : array())
			->count();

		$news = News::active()
			->byCatalog($idCatalog == 969 ? '' : $idCatalog)
			->byYear($year ? : '')
			->byCategories($categories ? : array())
			->desc()
			->skip($skip)
			->limit($perLoad)
			->get();

		$html = '';
		foreach ($news as $newItem) {

			$html .= View::make('about.press.partials.new_item', compact('newItem'))->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'skip'      => $skip + $perLoad,
				'exist'     => $total > ($skip + $perLoad) ? true : false,
				'html'      => $html,
			)
		);
	} // end doLoadPressItems

	public function showStructureContentFaq()
	{
		$page = $this->node;

		$tree = Collector::get('root');

		$subTree = Tree::getSubTree($tree, $page);

		$articles = null;
		if ($subTree) {
			$articles = $subTree->children;
		}

		return View::make('about.content_faq', compact('page', 'articles'));
	} // end showStructureContentFaq

	public function showAccordionDescription()
	{
		$page = $this->node;

		$tree = Collector::get('root');

		$subTree = Tree::getSubTree($tree, $page);

		$articles = null;
		if ($subTree) {
			$articles = $subTree->children;
		}

		return View::make('about.accordion_description', compact('page', 'articles'));
	} // end showAccordionDescription

	public function showStructureContent()
	{
		$page = $this->node;

		return View::make('about.content_page', compact('page'));
	} // end showStructureContent

	public function showCreditRepay() {

		$page = $this->node;

		$tree = Collector::get('root');

		$subTree = Tree::getSubTree($tree, $page);

		$blocks = null;
		if ($subTree) {
			$blocks = $subTree->children;
		}
		return View::make('about.credit_repay', compact('page', 'blocks'));
	}// end showCreditRepay
}
