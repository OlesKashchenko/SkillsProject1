<?php

return array(

	'install' => function() {

	}, // end install

	'view' => function(array $row) {
		return View::make('backend.refresh_rates', compact('row'));
	}, // end view

	'handle' => array(
		'insert' => function($values, $idRow) {

		}, // end insert

		'update' => function($values, $idRow) {

		}, // end update

		'delete' => function($idRow) {

		}, // end delete
	),

);