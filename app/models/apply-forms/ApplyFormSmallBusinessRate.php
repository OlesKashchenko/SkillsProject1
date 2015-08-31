<?php

class ApplyFormSmallBusinessRate extends ApplyFormAbstract
{

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->type = 'sb_rate';

        $this->setEmailFrom(Settings::get('email_from', 'noreply@alfabank.ua'));
        $this->setEmailFromTitle(Settings::get('email_from_title', 'Альфа-банк'));
        $this->prepareEmails(Settings::get('email_apply_forms', 'oleskashchenko@gmail.com'));

        $this->setSibelProject('Масс бизнес-Интернет');
    } // end __construct

    protected function prepareMailData()
    {
        $product = Tree::find($this->getPreparedItem('id_catalog'));
        $city = City::find($this->getPreparedItem('id_city'));
        if ($city) {
            $region = Region::find($city->id_region);
        }

        //$occupation = Occupation::find($this->getPreparedItem('id_occupation'));

        $this->setMessageSubject('Заявка на услугу: '. $product->title_ru);

        $this->appendMessageBody("<html><body>");
        $this->appendMessageBody("<p><b>Заявка на услугу:</b> ". $product->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Фамилия:</b> ". $this->getPreparedItem('last_name') ."</p>");
        $this->appendMessageBody("<p><b>Имя:</b> ". $this->getPreparedItem('first_name') ."</p>");
        $this->appendMessageBody("<p><b>Отчество:</b> ". $this->getPreparedItem('patronymic_name') ."</p>");
        //$this->appendMessageBody("<p><b>Занятость:</b> ". $occupation->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Email:</b> ". $this->getPreparedItem('email') ."</p>");
        $this->appendMessageBody("<p><b>Контактный телефон:</b> ". $this->getPreparedItem('phone_number') ."</p>");

        if (isset($region) && $region) {
            $this->appendMessageBody("<p><b>Область:</b> ". $region->title_ru ."</p>");
        }

        $this->appendMessageBody("<p><b>Город:</b> ". $city->title_ru ."</p>");
        $this->appendMessageBody("<p><b>Клиент банка:</b> ". ($this->getPreparedItem('is_bank_client') ? 'Да' : 'Нет') ."</p>");

        if ($this->getPreparedItem('partner_code')) {
            $this->appendMessageBody("<p><b>Код партнера:</b> ". $this->getPreparedItem('partner_code') ."</p>");
        }

        $this->appendMessageBody("<html><body>");
    } // end prepareMailData

    protected function sendSibelForm()
    {
        // fixme:
        $city = City::find($this->getPreparedItem('id_city'));
        if ($city) {
            $region = Region::find($city->id_region);
            $area = Area::find($region->id_area);
        }

        $client = new SibelClient();

        $client->setLastName($this->preparedData['last_name']);
        $client->setFirstName($this->preparedData['first_name']);
        $client->setMiddleName($this->preparedData['patronymic_name']);
        $client->setPhone($this->preparedData['phone_number']);
        $client->setProject($this->getSibelProject());
        $client->setCreatedDate(date('Y-m-d H:i:s'));

        if (isset($area) && $area && $city) {
            $client->setDescription($area->title_ru);
            $client->setComment($city->title_ru);
        }

        $orderCode = $client->registerShortApplication();

        $this->preparedData['sibel_request'] = $client->getXml();
        $this->preparedData['sibel_response'] = $orderCode;
    } // end sendSibelForm
}
