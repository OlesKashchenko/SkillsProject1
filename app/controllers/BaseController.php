<?php

class BaseController extends Yaro\Jarboe\TreeController
{

	public function init($node, $method)
	{
		// FIXME: move paramter to config
		if (!$node->isActive() && !Input::has('show')) {
			\App::abort(404);
		}

		$this->node = $node;

		return $this->$method();
	} // end init
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}