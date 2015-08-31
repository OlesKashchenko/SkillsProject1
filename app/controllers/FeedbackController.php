<?php

class FeedbackController extends BaseController
{

	public function __construct()
	{
		$params = array(
			'only' => array(
				'doSendFeedback',
			)
		);

		$this->beforeFilter('csrf', $params);
	} // end __construct

	public function showIndex()
	{
		$page = $this->node;
		$feedbacks = FeedbackForm::with('category')->active()->get();
		$themes = FeedbackTheme::active()->get();
		$helpers = FeedbackHelper::active()->get();
		$operatorCodes = explode(',', Settings::get('mobile_operators_codes'));

		return View::make(
			'feedback.index',
			compact('page', 'feedbacks', 'themes', 'operatorCodes', 'helpers', 'categories')
		);
	}

	public function doSendFeedback()
	{
		if (Input::get('type') == 'private') {
			$validator = Validator::make(
				array(
					'last_name'         => trim(Input::get('last_name')),
					'first_name'        => trim(Input::get('first_name')),
					'patronymic_name'   => trim(Input::get('patronymic_name')),
					'phone_number'      => trim(Input::get('phone_number')),
					'email'             => trim(Input::get('email')),
					'question'          => trim(Input::get('question')),
				),
				array(
					'last_name'         => 'required|min:2|max:32',
					'first_name'        => 'required|min:2|max:32',
					'patronymic_name'   => 'required|min:2|max:32',
					'phone_number'      => 'required|min:7|max:7',
					'email'             => 'required|email|min:6|max:32',
					'question'          => 'required',
				)
			);

			if ($validator->fails()) {
				return Response::json(
					array('status' => false)
				);
			}

			FeedbackForm::create(array(
				'id_theme'          => Input::get('subject'),
				'full_name'         => trim(Input::get('last_name')) .' '. trim(Input::get('first_name')) .' '. trim(Input::get('patronymic_name')),
				'phone_number'      => trim(Input::get('phone_code')) . trim(Input::get('phone_number')),
				'email'             => trim(Input::get('email')),
				'question'          => trim(Input::get('question')),
				'is_bank_client'    => 0,
				'is_active'         => 0,
			));

		} else {
			$validator = Validator::make(
				array(
					'name'              => trim(Input::get('name')),
					'phone_number'      => trim(Input::get('phone_number')),
					'email'             => trim(Input::get('email')),
					'question'          => trim(Input::get('question')),
				),
				array(
					'name'              => 'required|min:2|max:255',
					'phone_number'      => 'required|min:7|max:7',
					'email'             => 'required|email|min:6|max:32',
					'question'          => 'required',
				)
			);

			if ($validator->fails()) {
				return Response::json(
					array('status' => false)
				);
			}

			FeedbackForm::create(array(
				'id_theme'          => Input::get('subject'),
				'full_name'         => trim(Input::get('name')),
				'phone_number'      => trim(Input::get('phone_code')) . trim(Input::get('phone_number')),
				'email'             => trim(Input::get('email')),
				'question'          => trim(Input::get('question')),
				'is_bank_client'    => 1,
				'is_active'         => 0,
			));
		}

		return Response::json(
			array('status' => true)
		);
	}
}
