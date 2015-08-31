<?php

class AsyncController extends BaseController
{

	public function __construct()
	{
		$this->beforeFilter('ajax');
	}

	// Cards

	public function addCardToCompare()
	{
		$id = trim(Input::get('id'));

		if (!$id) {
			return Response::json(
				array('status' => false)
			);
		}

		$cardsIds = Tree::addCardToCompare($id);

		$html = '';
		if ($cardsIds) {
			$cardsCompared = Tree::with('card')->whereIn('id', $cardsIds)->active()->get();
			$html = View::make('partials.cards_compare', compact('cardsCompared'))->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'html'      => $html,
				'active'    => count($cardsIds) > 1 ? true : false,
			)
		);
	} // end addCardToCompare

	public function removeCardFromCompare()
	{
		$id = trim(Input::get('id'));

		if (!$id) {
			return Response::json(
				array('status' => false)
			);
		}

		$cardsIds = Tree::removeCardFromCompare($id);

		$html = '';
		if ($cardsIds) {
			$cardsCompared = Tree::with('card')->whereIn('id', $cardsIds)->active()->get();
			$html = View::make('partials.cards_compare', compact('cardsCompared'))->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'html'      => $html,
				'active'    => count($cardsIds) > 1 ? true : false,
			)
		);
	} // end removeCardFromCompare

	public function formCardCompare()
	{
		$cardsIds = Tree::getCardsCompared();
		$html = '';
		if ($cardsIds) {
			$cardsCompared = Tree::with('card')->whereIn('id', $cardsIds)->active()->get();
			$html = View::make('partials.popups.cards_compare_inner', compact('cardsCompared'))->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'html'      => $html
			)
		);
	} // end formCardCompare

	// end Cards

	public function getCitiesByRegion()
	{
		$idRegion = trim(Input::get('id_region')) ? : 0;

		$cities = Cache::tags('cities')->rememberForever('cities_region_'. $idRegion .'_'. App::getLocale(), function() use ($idRegion) {
			return City::active()->byRegion($idRegion)->get();
		});

		$html = View::make('partials.popups.partials.select_city', compact('cities'))->render();

		return Response::json(
			array(
				'status'    => true,
				'html'      => $html
			)
		);
	} // end getCitiesByRegion
}
