<?php

class Breadcrumbs extends ArrayObject
{

	private $breadcrumbs = array();


	public function __construct($current)
	{
		$breadcrumbs = $current->getAncestorsAndSelf();

		foreach ($breadcrumbs as $breadcrumb) {
			$this->breadcrumbs[] = array(
				'url'   => $breadcrumb->getUrl(),
				'title' => $breadcrumb->t('title'),
			);
		}

		$lastValue = array_pop($this->breadcrumbs);
		$secondValue = array_pop($this->breadcrumbs);

		$this->breadcrumbs = array($secondValue, $lastValue);
	} // end __construct

	public function __get($name)
	{
		if ($name == 'crumbs') {
			return $this->breadcrumbs;
		}

		throw new RuntimeException('Breadcrumbs error!');
	} // end __get

	public function add($url, $title)
	{
		$this->breadcrumbs[] = array(
			'url'   => $url,
			'title' => $title,
		);
	} // end add

	public function pop()
	{
		array_pop($this->breadcrumbs);
	} // end pop
}
