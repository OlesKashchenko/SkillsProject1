<?php

class ApplyController extends BaseController
{

	public function __construct()
	{
		$params = array(
			'only' => array(
				'doApplyProduct',
				'doApplyBusiness',
				'doApplyPartner',
				'doApplySubscriber',
			)
		);

		$this->beforeFilter('csrf', $params);
	} // end __construct

	public function doApplyProduct()
	{
		$type = trim(Input::get('apply_form_type'));
		if (!$type) {
			return Response::json(array('status' => false));
		}

		$applyForm = ApplyFormFactory::create($type);
		$applyForm->setData(Input::all());
		$result = $applyForm->apply();

		return Response::json(array('status' => $result));
	} // end doApplyProduct

	public function doApplyBusiness()
	{
		$validator = Validator::make(
			array(
				'id_catalog'        => trim(Input::get('id_catalog')),
				'last_name'         => trim(Input::get('last_name')),
				'first_name'        => trim(Input::get('first_name')),
				'patronymic_name'   => trim(Input::get('patronymic_name')),
				'phone_number'      => trim(Input::get('phone_number')),
				'email'             => trim(Input::get('email')),
				'confirm'           => Input::get('confirm'),
			),
			array(
				'id_catalog'        => 'required',
				'last_name'         => 'required|min:2|max:32',
				'first_name'        => 'required|min:2|max:32',
				'patronymic_name'   => 'required|min:2|max:32',
				'phone_number'      => 'required|min:7|max:7',
				'email'             => 'required|email|min:6|max:32',
				'confirm'           => 'accepted',
			)
		);

		if ($validator->fails()) {
			return Response::json(
				array('status' => false)
			);
		}

		ApplyForm::create(array(
			'id_occupation'     => trim(Input::get('occupation')),
			'id_catalog'        => trim(Input::get('id_catalog')),
			'last_name'         => trim(Input::get('last_name')),
			'first_name'        => trim(Input::get('first_name')),
			'patronymic_name'   => trim(Input::get('patronymic_name')),
			'phone_number'      => trim(Input::get('phone_code')) . trim(Input::get('phone_number')),
			'email'             => trim(Input::get('email')),
			'partner_code'      => trim(Input::get('partner_code')),
			'is_bank_client'    => 0,
		));

		return Response::json(
			array('status' => true)
		);
	} // end doApplyBusiness

	public function doApplyPartner()
	{
		$validator = Validator::make(
			array(
				'last_name'                 => trim(Input::get('last_name')),
				'first_name'                => trim(Input::get('first_name')),
				'patronymic_name'           => trim(Input::get('patronymic_name')),
				'phone_number'              => trim(Input::get('phone_number')),
				'email'                     => trim(Input::get('email')),
				'partner_last_name'         => trim(Input::get('partner_last_name')),
				'partner_first_name'        => trim(Input::get('partner_first_name')),
				'partner_patronymic_name'   => trim(Input::get('partner_patronymic_name')),
				'partner_phone_number'      => trim(Input::get('partner_phone_number')),
				'confirm'                   => Input::get('confirm'),
			),
			array(
				'last_name'                 => 'required|min:2|max:32',
				'first_name'                => 'required|min:2|max:32',
				'patronymic_name'           => 'required|min:2|max:32',
				'phone_number'              => 'required|min:7|max:7',
				'email'                     => 'required|email|min:6|max:32',
				'partner_last_name'         => 'required|min:2|max:32',
				'partner_first_name'        => 'required|min:2|max:32',
				'partner_patronymic_name'   => 'required|min:2|max:32',
				'partner_phone_number'      => 'required|min:7|max:7',
				'confirm'                   => 'accepted',
			)
		);

		if ($validator->fails()) {
			return Response::json(
				array('status' => false)
			);
		}

		ApplyFormPartner::create(array(
			'id_occupation'             => trim(Input::get('occupation')),
			'last_name'                 => trim(Input::get('last_name')),
			'first_name'                => trim(Input::get('first_name')),
			'patronymic_name'           => trim(Input::get('patronymic_name')),
			'phone_number'              => trim(Input::get('phone_code')) . trim(Input::get('phone_number')),
			'email'                     => trim(Input::get('email')),
			'partner_last_name'         => trim(Input::get('partner_last_name')),
			'partner_first_name'        => trim(Input::get('partner_first_name')),
			'partner_patronymic_name'   => trim(Input::get('partner_patronymic_name')),
			'partner_phone_number'      => trim(Input::get('partner_phone_code')) . trim(Input::get('partner_phone_number')),
		));

		return Response::json(
			array('status' => true)
		);
	} // end doApplyPartner

    public function doApplySubscriber()
    {
        $validator = Validator::make(
            array('email' => trim(Input::get('email'))),
            array('email' => 'required|email|min:6|max:32')
        );

        if ($validator->fails()) {
            return Response::json(
                array('status' => false)
            );
        }

        $existed = Subscriber::where('email', trim(Input::get('email')))->first();
        if ($existed) {
            return Response::json(
                array(
	                'status' => false,
	                'exist' => true
                )
            );
        }

        Subscriber::create(array(
            'email' => trim(Input::get('email')),
        ));

        return Response::json(
            array('status' => true)
        );
    } // end doApplySubscriber
}
