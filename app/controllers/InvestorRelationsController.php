<?php

class InvestorRelationsController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $blocks = null;
        if ($subTree) {
            foreach ($subTree->children as $node) {
                if ($node->slug != 'blocks') {
                    continue;
                }

                $blocks = $node->children;
                break;
            }
        }

        foreach ($blocks as $index => $block) {
            $blocks[$block->slug] = $block;
            unset($blocks[$index]);
        }

        if (isset($blocks['reporting'])) {
            $blocks['reporting']->children = $blocks['reporting']->children->reverse();
        }

        $news = News::active()
            ->byCatalog(Collector::get('idNewsCatalog'))
            ->byCategories(Collector::get('idInvestorRelationsCategory'))
            ->desc()
            ->get();

		$offices = Office::with('city')->active()->legal()->get();
		$officesMap = Office::getMap($offices);

		return View::make('investor.index', compact('page', 'blocks', 'news', 'officesMap'));
	}

	public function showCorporate()
	{
		$page = $this->node;

		return View::make('investor.corporate', compact('page'));
	}

	public function showDocuments()
	{
		$page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $documents = null;
        if ($subTree) {
            $documents = $subTree->children;
        }

		return View::make('investor.documents', compact('page', 'documents'));
	}

	public function showRisksManagement()
	{
		$page = $this->node;

        $tree = Collector::get('root');

        $subTree = Tree::getSubTree($tree, $page);

        $risks = null;
        if ($subTree) {
            $risks = $subTree->children;
        }

		return View::make('investor.risks', compact('page', 'risks'));
	}

	public function showLeadership()
	{
		$page = $this->node;
		$leaders = $page->immediateDescendants()->active()->get();

		return View::make('investor.leadership', compact('page', 'leaders'));
	}

	public function showStructure()
	{
		$page = $this->node;
		$items = $page->immediateDescendants()->active()->get();
		foreach($items as $index => $item) {
			unset($items[$index]);
			$items[$item->slug] = $item;
		}

		return View::make('investor.structure', compact('page', 'items'));
	}

	public function showStructureCorporate()
	{
		$page = $this->node;

		return View::make('investor.structure_corporate', compact('page'));
	}
}
