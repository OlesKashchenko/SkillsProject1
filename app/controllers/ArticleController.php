<?php

class ArticleController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		return View::make('common.content_article', compact('page'));
	} // end showIndex
}
