<?php

class MapController extends BaseController
{

	public function showIndex()
	{
		$page = $this->node;

		$offices = Cache::tags('offices')->rememberForever('map_offices_'. App::getLocale(), function() {
			return Office::with('city')->active()->byType('office')->get();
		});

		$officesMap = Office::getMap($offices);

		return View::make('map.index', compact('page', 'officesMap'));
	} // end showIndex

	public function doFilter()
	{
		if (!Request::ajax()) {
			App::abort(404);
		}

		$offices = Cache::tags('offices')->rememberForever('map_offices_filter_'. md5(json_encode(Input::all())) .'_'. App::getLocale(), function() {
			return Office::with('city')->active()->filter(Input::all())->orderBy('id_city', 'asc')->get();
		});

		$officesMap = Office::getMap($offices);

		$officesPopupsHtml = '';
		$officesListHtml = '';
		foreach ($officesMap as $officeMap) {
			$officesPopupsHtml .= View::make('partials.popups.office_info', compact('officeMap'))->render();
			$officesListHtml .= View::make('map.partials.list_item', compact('officeMap'))->render();
		}

		return Response::json(
			array(
				'status'    => true,
				'offices'   => json_encode($officesMap),
				'html'      => $officesPopupsHtml,
				'html_list' => $officesListHtml,
			)
		);
	} // end doFilter
}
