<?php

/*
 * Abstract class for the apply forms
 */
abstract class ApplyFormAbstract extends Eloquent
{

	protected $table = 'apply_forms';
	protected $fillable = array(
		'is_bank_client',
		'last_name',
		'first_name',
		'patronymic_name',
		'phone_number',
		'email',
		'id_occupation',
		'id_catalog',
		'type',
		'passport',
		'inn',
		'partner_code',

		'credit_type',
		'is_insurance_loss_job',
		'is_insurance_accident',
		'sibel_request',
		'sibel_response',

		// refinance
		'monthly_fee',
		'left_to_repay_months',
		'left_to_repay_money',

		// consumer
		'id_city',
		'id_shop',
		'id_product_type',
		'product_price',
		'term',

		// cash
		'monthly_income',
		'credit_amount',

		// deposit
		'deposit_amount',
		'monthly_installment',
		'currency',
		'interest_payment_percent',
		'interest_payment_type',
	);

	// form input data
	protected $input;
	protected $preparedData = array();
	protected $type;

	// message data
	protected $emails = array();
	protected $emailFrom = '';
	protected $emailFromTitle = '';
	protected $messageSubject = '';
	protected $messageBody = '';

	// sibel data
	protected $sibelProject;


	// getters & setters
	public function getType()
	{
		return $this->type;
	} // end getType

	public function setType($type)
	{
		$this->type = $type;
	} // end setType

	public function getData()
	{
		return $this->input;
	} // end getData

	public function setData($data)
	{
		$this->input = $data;
	} // end setData

	public function getPreparedData()
	{
		return $this->preparedData;
	} // end getPreparedData

	public function setPreparedData($data)
	{
		$this->preparedData = $data;
	} // end setPreparedData

	public function getEmails()
	{
		return $this->emails;
	} // end getEmails

	public function setEmails($emails)
	{
		$this->emails = $emails;
	} // end setEmails

	public function getEmailFrom()
	{
		return $this->emailFrom;
	} // end getEmailFrom

	public function setEmailFrom($email)
	{
		$this->emailFrom = $email;
	} // end setEmailFrom

	public function getEmailFromTitle()
	{
		return $this->emailFromTitle;
	} // end getEmailFromTitle

	public function setEmailFromTitle($title)
	{
		$this->emailFromTitle = $title;
	} // end setEmailFromTitle

	public function getMessageSubject()
	{
		return $this->messageSubject;
	} // end getMessageSubject

	public function setMessageSubject($subject)
	{
		$this->messageSubject = $subject;
	} // end setMessageSubject

	public function getMessageBody()
	{
		return $this->messageBody;
	} // end getMessageBody

	public function setMessageBody($body)
	{
		$this->messageBody = $body;
	} // end setMessageBody

	public function getSibelProject()
	{
		return $this->sibelProject;
	} // end getSibelProject

	public function setSibelProject($project)
	{
		$this->sibelProject = $project;
	} // end setSibelProject
	// end getters & setters


	/*
	 * Append string to the email message body
	 */
	public function appendMessageBody($string)
	{
		$this->messageBody .= $string;
	} // end appendMessageBody

	/*
	 * Get prepared value from user form input
	 */
	public function getPreparedItem($key)
	{
		if (!$key) {
			return '';
		}

		return (isset($this->getPreparedData()[$key])) ? trim($this->getPreparedData()[$key]) : '';
	}

	/*
	 *  Prepare settings emails for sending messages
	 */
	public function prepareEmails($emails)
	{
		if (!$emails) {
			return false;
		}

		$emails = explode(',', $emails);
		if ($emails) {
			$this->emails = array_map('trim', $emails);
		}
	} // end prepareEmails

	/*
	 * Apply form
	 */
	public function apply()
	{
		if (!$this->validate()) {
			return false;
		}

		$this->prepare();

		if (!$this->getPreparedItem('partner_code')) {
			$this->sendSibelForm();
		}

		$this->sendMailForm();

		return self::create($this->preparedData);
	} // end apply

	/*
	 * Validate form
	 */
	protected function validate()
	{
		$validator = Validator::make(
			array(
				'id_catalog'        => trim($this->input['id_catalog']),
				'id_city'           => trim($this->input['city']),
				'apply_form_type'   => $this->type,
				'last_name'         => trim($this->input['last_name']),
				'first_name'        => trim($this->input['first_name']),
				'patronymic_name'   => trim($this->input['patronymic_name']),
				'phone_number'      => trim($this->input['phone_number']),
				'email'             => trim($this->input['email']),
				'confirm'           => isset($this->input['confirm']) ? $this->input['confirm'] : '',
			),
			array(
				'id_catalog'        => 'required',
				'id_city'           => 'required',
				'apply_form_type'   => 'required',
				'last_name'         => 'required|min:2|max:32',
				'first_name'        => 'required|min:2|max:32',
				'patronymic_name'   => 'required|min:2|max:32',
				'phone_number'      => 'required|min:7|max:7',
				'email'             => 'required|email|min:6|max:32',
				'confirm'           => 'accepted',
			)
		);

		return $validator->fails() ? false : true;
	} // end validate

	/*
	 * Prepare values from user input
	 */
	protected function prepare()
	{
		$this->preparedData = array(
			//'id_occupation'     => trim($this->input['occupation']),
			'id_catalog'        => trim($this->input['id_catalog']),
			'type'              => $this->type,
			'last_name'         => trim($this->input['last_name']),
			'first_name'        => trim($this->input['first_name']),
			'patronymic_name'   => trim($this->input['patronymic_name']),
			'phone_number'      => trim($this->input['phone_code']) . trim($this->input['phone_number']),
			'email'             => trim($this->input['email']),
			'id_city'           => trim($this->input['city']),
			'is_bank_client'    => isset($this->input['bank_client']) ? 1 : 0,
		);

		if (isset($this->input['partner_code']) && trim($this->input['partner_code'])) {
			$this->preparedData['partner_code'] = trim($this->input['partner_code']);
		}
	} // end prepare

	/*
	 * Send message to the user
	 */
	protected function sendMailForm()
	{
		$this->prepareMailData();

		$mailClient = new MailClient();

		$mailClient->setEmailsTo($this->getEmails());
		$mailClient->setEmailFrom($this->getEmailFrom());
		$mailClient->setEmailFromTitle($this->getEmailFromTitle());
		$mailClient->setSubject($this->getMessageSubject());
		$mailClient->setBody($this->getMessageBody());

		$mailClient->send();
	} // end sendMailForm

	/*
	 * Send form to Sibel CMS
	 */
	protected function sendSibelForm()
	{
		$client = new SibelClient();

		$client->setLastName($this->preparedData['last_name']);
		$client->setFirstName($this->preparedData['first_name']);
		$client->setMiddleName($this->preparedData['patronymic_name']);
		$client->setPhone($this->preparedData['phone_number']);
		$client->setProject($this->getSibelProject());
		$client->setCreatedDate(date('Y-m-d H:i:s'));

		$orderCode = $client->registerShortApplication();

		$this->preparedData['sibel_request'] = $client->getXml();
		$this->preparedData['sibel_response'] = $orderCode;
	} // end sendSibelForm

	/*
	 * Prepare message body data
	 */
	abstract protected function prepareMailData(); // end prepareMailData
}
