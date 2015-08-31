<?php

class ApplyFormPrivatesDeposit extends ApplyFormAbstract
{

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->type = 'deposit';

        $this->setEmailFrom(Settings::get('email_from', 'noreply@alfabank.ua'));
        $this->setEmailFromTitle(Settings::get('email_from_title', 'Альфа-банк'));
        $this->prepareEmails(Settings::get('email_apply_forms', 'oleskashchenko@gmail.com'));

        $this->setSibelProject('web-depozit');
    } // end __construct

    public function validate()
    {
        $validator = Validator::make(
            array(
                'id_catalog'        => trim($this->input['id_catalog']),
                'apply_form_type'   => $this->type,
                'last_name'         => trim($this->input['last_name']),
                'first_name'        => trim($this->input['first_name']),
                'patronymic_name'   => trim($this->input['patronymic_name']),
                'phone_number'      => trim($this->input['phone_number']),
                'confirm'           => isset($this->input['confirm']) ? $this->input['confirm'] : '',

            ),
            array(
                'id_catalog'        => 'required',
                'apply_form_type'   => 'required',
                'last_name'         => 'required|min:2|max:32',
                'first_name'        => 'required|min:2|max:32',
                'patronymic_name'   => 'required|min:2|max:32',
                'phone_number'      => 'required|min:7|max:7',
                'confirm'           => 'accepted',

            )
        );

        return $validator->fails() ? false : true;
    } // end validate

    public function prepare()
    {
        $this->preparedData = array(
            'id_catalog'        => trim($this->input['id_catalog']),
            'type'              => $this->type,
            'last_name'         => trim($this->input['last_name']),
            'first_name'        => trim($this->input['first_name']),
            'patronymic_name'   => trim($this->input['patronymic_name']),
            'phone_number'      => trim($this->input['phone_code']) . trim($this->input['phone_number']),
            'is_bank_client'    => isset($this->input['bank_client']) ? 1 : 0,
        );

        if (isset($this->input['partner_code']) && trim($this->input['partner_code'])) {
            $this->preparedData['partner_code'] = trim($this->input['partner_code']);
        }

        if (isset($this->input['deposit_amount']) && trim($this->input['deposit_amount'])) {
            $this->preparedData['deposit_amount'] = trim($this->input['deposit_amount']);
        }

        if (isset($this->input['term']) && trim($this->input['term'])) {
            $this->preparedData['term'] = trim($this->input['term']);
        }

        if (isset($this->input['monthly_installment']) && trim($this->input['monthly_installment'])) {
            $this->preparedData['monthly_installment'] = trim($this->input['monthly_installment']);
        }

        if (isset($this->input['currency']) && trim($this->input['currency'])) {
            $this->preparedData['currency'] = trim($this->input['currency']);
        }

        if (isset($this->input['interest_payment_percent']) && trim($this->input['interest_payment_percent'])) {
            $this->preparedData['interest_payment_percent'] = trim($this->input['interest_payment_percent']);
        }

        if (isset($this->input['interest_payment_type']) && trim($this->input['interest_payment_type'])) {
            $this->preparedData['interest_payment_type'] = trim($this->input['interest_payment_type']);
        }
    } // end prepare

    protected function prepareMailData()
    {
        $product = Tree::find($this->getPreparedItem('id_catalog'));

        $this->setMessageSubject('Заявка на услугу: '. $product->title_ru);

        $this->appendMessageBody("<html><body>");
        $this->appendMessageBody("<p><b>Заявка на услугу:</b> ". $product->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Фамилия:</b> ". $this->getPreparedItem('last_name') ."</p>");
        $this->appendMessageBody("<p><b>Имя:</b> ". $this->getPreparedItem('first_name') ."</p>");
        $this->appendMessageBody("<p><b>Отчество:</b> ". $this->getPreparedItem('patronymic_name') ."</p>");
        $this->appendMessageBody("<p><b>Контактный телефон:</b> ". $this->getPreparedItem('phone_number') ."</p>");
        $this->appendMessageBody("<p><b>Клиент банка:</b> ". ($this->getPreparedItem('is_bank_client') ? 'Да' : 'Нет') ."</p>");

        if ($this->getPreparedItem('deposit_amount')) {
            $this->appendMessageBody("<p><b>Сумма вклада:</b> ". $this->getPreparedItem('deposit_amount') ."</p>");
        }

        if ($this->getPreparedItem('term')) {
            $this->appendMessageBody("<p><b>Срок:</b> ". $this->getPreparedItem('term') ."</p>");
        }

        if ($this->getPreparedItem('monthly_installment')) {
            $this->appendMessageBody("<p><b>Ежемесячный взнос:</b> ". $this->getPreparedItem('monthly_installment') ."</p>");
        }

        if ($this->getPreparedItem('currency')) {
            $this->appendMessageBody("<p><b>Валюта:</b> ". $this->getPreparedItem('currency') ."</p>");
        }

        if ($this->getPreparedItem('interest_payment_percent')) {
            $this->appendMessageBody("<p><b>Выплата процентов (%):</b> ". $this->getPreparedItem('interest_payment_percent') ."</p>");
        }

        if ($this->getPreparedItem('interest_payment_type')) {
            if ($this->getPreparedItem('interest_payment_type') == 'end') {
                $type = 'в конце срока';
            } else if ($this->getPreparedItem('interest_payment_type') == 'monthly') {
                $type = 'ежемесячно';
            } else {
                $type = 'капитализация';
            }

            $this->appendMessageBody("<p><b>Выплата процентов:</b> ". $type ."</p>");
        }

        $this->appendMessageBody("<html><body>");
    } // end prepareMailData
}
