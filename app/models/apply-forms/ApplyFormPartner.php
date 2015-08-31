<?php

class ApplyFormPartner extends Eloquent
{

    protected $table = 'apply_forms_partners';
    protected $fillable = array(
        'last_name',
        'first_name',
        'patronymic_name',
        'phone_number',
        'email',
        'id_occupation',
        'partner_last_name',
        'partner_first_name',
        'partner_patronymic_name',
        'partner_phone_number',
    );
}