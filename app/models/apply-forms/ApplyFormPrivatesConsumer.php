<?php

class ApplyFormPrivatesConsumer extends ApplyFormAbstract
{

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->type = 'consumer';

        $this->setEmailFrom(Settings::get('email_from', 'noreply@alfabank.ua'));
        $this->setEmailFromTitle(Settings::get('email_from_title', 'Альфа-банк'));
        $this->prepareEmails(Settings::get('email_apply_forms', 'oleskashchenko@gmail.com'));

        $this->setSibelProject('WEB Short CSF');
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
                'email'             => trim($this->input['email']),
                'passport'          => trim($this->input['passport']),
                'inn'               => trim($this->input['inn']),
                'confirm'           => isset($this->input['confirm']) ? $this->input['confirm'] : '',

            ),
            array(
                'id_catalog'        => 'required',
                'apply_form_type'   => 'required',
                'last_name'         => 'required|min:2|max:32',
                'first_name'        => 'required|min:2|max:32',
                'patronymic_name'   => 'required|min:2|max:32',
                'phone_number'      => 'required|min:7|max:7',
                'email'             => 'required|email|min:6|max:32',
                'passport'          => 'required|min:8|max:8',
                'inn'               => 'required|min:10|max:12',
                'confirm'           => 'accepted',

            )
        );

        return $validator->fails() ? false : true;
    } // end validate

    public function prepare()
    {
        $this->preparedData = array(
            'id_occupation'     => trim($this->input['occupation']),
            'id_catalog'        => trim($this->input['id_catalog']),
            'type'              => $this->type,
            'last_name'         => trim($this->input['last_name']),
            'first_name'        => trim($this->input['first_name']),
            'patronymic_name'   => trim($this->input['patronymic_name']),
            'phone_number'      => trim($this->input['phone_code']) . trim($this->input['phone_number']),
            'email'             => trim($this->input['email']),
            'passport'          => trim($this->input['passport']),
            'inn'               => trim($this->input['inn']),
            'is_bank_client'    => isset($this->input['bank_client']) ? 1 : 0,
        );

        if (isset($this->input['id_city']) && trim($this->input['id_city'])) {
            $this->preparedData['id_city'] = trim($this->input['id_city']);
        }

        if (isset($this->input['id_shop']) && trim($this->input['id_shop'])) {
            $this->preparedData['id_shop'] = trim($this->input['id_shop']);
        }

        if (isset($this->input['id_product_type']) && trim($this->input['id_product_type'])) {
            $this->preparedData['id_product_type'] = trim($this->input['id_product_type']);
        }

        if (isset($this->input['product_price']) && trim($this->input['product_price'])) {
            $this->preparedData['product_price'] = trim($this->input['product_price']);
        }

        if (isset($this->input['credit_term']) && trim($this->input['credit_term'])) {
            $this->preparedData['term'] = trim($this->input['credit_term']);
        }

        if (isset($this->input['is_insurance_loss_job']) && trim($this->input['is_insurance_loss_job'])) {
            $this->preparedData['is_insurance_loss_job'] = trim($this->input['is_insurance_loss_job']);
        }

        if (isset($this->input['is_insurance_accident']) && trim($this->input['is_insurance_accident'])) {
            $this->preparedData['is_insurance_accident'] = trim($this->input['is_insurance_accident']);
        }
    } // end prepare

    protected function prepareMailData()
    {
        $product = Tree::find($this->getPreparedItem('id_catalog'));
        $occupation = Occupation::find($this->getPreparedItem('id_occupation'));

        $this->setMessageSubject('Заявка на услугу: '. $product->title_ru);

        $this->appendMessageBody("<html><body>");
        $this->appendMessageBody("<p><b>Заявка на услугу:</b> ". $product->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Фамилия:</b> ". $this->getPreparedItem('last_name') ."</p>");
        $this->appendMessageBody("<p><b>Имя:</b> ". $this->getPreparedItem('first_name') ."</p>");
        $this->appendMessageBody("<p><b>Отчество:</b> ". $this->getPreparedItem('patronymic_name') ."</p>");
        $this->appendMessageBody("<p><b>Занятость:</b> ". $occupation->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Email:</b> ". $this->getPreparedItem('email') ."</p>");
        $this->appendMessageBody("<p><b>Контактный телефон:</b> ". $this->getPreparedItem('phone_number') ."</p>");
        $this->appendMessageBody("<p><b>Паспорт:</b> ". $this->getPreparedItem('passport') ."</p>");
        $this->appendMessageBody("<p><b>ИНН:</b> ". $this->getPreparedItem('inn') ."</p>");
        $this->appendMessageBody("<p><b>Клиент банка:</b> ". ($this->getPreparedItem('is_bank_client') ? 'Да' : 'Нет') ."</p>");

        if ($this->getPreparedItem('id_city')) {
            $city = City::find($this->getPreparedItem('id_city'));
            if (isset($city->title_ru)) {
                $this->appendMessageBody("<p><b>Город:</b> ". $city->title_ru ."</p>");
            }
        }

        if ($this->getPreparedItem('id_shop')) {
            $shop = Shop::find($this->getPreparedItem('id_shop'));
            if (isset($shop->title_ru)) {
                $this->appendMessageBody("<p><b>Магазин:</b> ". $shop->title_ru ."</p>");
            }
        }

        if ($this->getPreparedItem('id_product_type')) {
            $productType = Product::find($this->getPreparedItem('id_product_type'));
            if (isset($productType->title_ru)) {
                $this->appendMessageBody("<p><b>Тип товара:</b> ". $productType->title_ru ."</p>");
            }
        }

        if ($this->getPreparedItem('product_price')) {
            $this->appendMessageBody("<p><b>Стоимость товара:</b> ". $this->getPreparedItem('product_price') ."</p>");
        }

        if ($this->getPreparedItem('term')) {
            $this->appendMessageBody("<p><b>Срок кредита:</b> ". $this->getPreparedItem('term') ."</p>");
        }

        if ($this->getPreparedItem('is_insurance_loss_job')) {
            $this->appendMessageBody("<p><b>Страховка от временной потери работы:</b> Да</p>");
        }

        if ($this->getPreparedItem('is_insurance_accident')) {
            $this->appendMessageBody("<p><b>Страховка от несчастного случая:</b> Да</p>");
        }

        $this->appendMessageBody("<html><body>");
    } // end prepareMailData
}
