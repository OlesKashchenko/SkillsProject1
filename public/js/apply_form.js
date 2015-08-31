'use strict';

var ApplyForm =
{

    init: function()
    {
        ApplyForm.initValidationEvents();

        ApplyForm.initApplyFormValidation();
        ApplyForm.initApplyFormDepositValidation();
        ApplyForm.initApplyFormBusinessValidation();
        ApplyForm.initFormPartnerValidation();
        ApplyForm.initSubscriberValidation();
    }, // end init

    /*
    Validate apply forms fields
     */
    initValidationEvents: function ()
    {
        jQuery('body form input[data-cyrillic="1"]').keyup(function() {
            this.value = this.value.replace(/[^а-я]/i, "");
        });
    }, // end initValidationEvents

    /*
    Process handling of all the credit products apply forms on the website
     */
    initApplyFormValidation: function()
    {
        var $validator = jQuery('#apply_form_credit').validate({
            rules: {
                'last_name' : { required : true },
                'first_name' : { required : true },
                'patronymic_name' : { required : true },
                'phone_number' : { required : true, digits : true, maxlength: 7 },
                'email' : { required : true, email: true, maxlength: 32 },
                'occupation' : { required : true },
                'passport' : { required : true, minlength: 8, maxlength: 8 },
                'inn' : { required : true, digits : true, minlength: 10, maxlength: 12 },
                'confirm' : { required : true }
            },

            messages: {
                'last_name' : { required : '' },
                'first_name' : { required : '' },
                'patronymic_name' : { required : '' },
                'phone_number' : { required : '', digits : '' },
                'email' : { required : '', email: '' },
                'occupation' : { required : '' },
                'passport' : { required : '' },
                'inn' : { required : '', digits : '' },
                'confirm' : { required : '' }
            },

            submitHandler : function(form) {
                var data = jQuery(form).serializeArray();
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/apply-form/product',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();
                            jQuery('.popup_apply_form .close').click();

                            showSuccessMessage(Translator.t('Спасибо, ваша заявка принята!'));

                        } else {
                            // todo:
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {}
        });
    }, // end initApplyFormValidation

    /*
     Process handling of deposit apply forms on the website
     */
    initApplyFormDepositValidation: function()
    {
        var $validator = jQuery('#apply_form_deposit').validate({
            rules: {
                'last_name': { required: true },
                'first_name': { required: true },
                'patronymic_name': { required: true },
                'phone_number': { required: true },
                'confirm': { required: true }
            },

            messages: {
                'last_name': { required: '' },
                'first_name': { required: '' },
                'patronymic_name': { required: '' },
                'phone_number': {required: '', digits: ''},
                'confirm': {required: ''}
            },

            submitHandler : function(form) {
                var data = jQuery(form).serializeArray();
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/apply-form/product',
                    type:       'post',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();
                            jQuery('.popup_apply_form_deposit .close').click();

                            showSuccessMessage(Translator.t('Спасибо, ваша заявка принята!'));

                        } else {
                            // todo:
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {}
        });
    }, // end initApplyFormDepositValidation

    /*
     Process handling of mass business apply forms on the website
     */
    initApplyFormBusinessValidation: function()
    {
        var $validator = jQuery('#apply_form_business').validate({
            rules: {
                'last_name' : { required : true },
                'first_name' : { required : true },
                'patronymic_name' : { required : true },
                'phone_number' : { required : true, digits : true, maxlength: 7 },
                'email' : { required : true, email: true, maxlength: 32 },
                'occupation' : { required : true },
                'confirm' : { required : true },
                'region' : { required : true },
                'city' : { required : true }
            },

            messages: {
                'last_name' : { required : '' },
                'first_name' : { required : '' },
                'patronymic_name' : { required : '' },
                'phone_number' : { required : '', digits : '', maxlength: '' },
                'email' : { required : '', email: '', maxlength: '' },
                'occupation' : { required : '' },
                'confirm' : { required : '' },
                'region' : { required : '' },
                'city' : { required : '' }
            },

            submitHandler : function(form) {
                var data = jQuery(form).serializeArray();
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/apply-form/product',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();
                            jQuery('.popup_packet_form .close').click();

                            showSuccessMessage(Translator.t('Спасибо, ваша заявка принята!'));

                        } else {
                            // todo:
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {}
        });
    }, // end initApplyFormBusinessValidation

    /*
    Process handling of partner apply forms on the website
     */
    initFormPartnerValidation: function()
    {
        var $validator = jQuery('#apply_form_partner').validate({
            ignore: ':hidden:not(:checkbox)',
            rules: {
                'last_name' : { required : true },
                'first_name' : { required : true },
                'patronymic_name' : { required : true },
                'phone_number' : { required : true, digits : true, maxlength: 7 },
                'email' : { required : true, email: true, maxlength: 32 },
                'occupation' : { required : true },
                'partner_last_name' : { required : true },
                'partner_first_name' : { required : true },
                'partner_patronymic_name' : { required : true },
                'partner_phone_number' : { required : true, digits : true, maxlength: 7 },
                'confirm' : { required : true }
            },

            messages: {
                'last_name' : { required : '' },
                'first_name' : { required : '' },
                'patronymic_name' : { required : '' },
                'phone_number' : { required : '', digits : '' },
                'email' : { required : '', email: '' },
                'occupation' : { required : '' },
                'partner_last_name' : { required : '' },
                'partner_first_name' : { required : '' },
                'partner_patronymic_name' : { required : '' },
                'partner_phone_number' : { required : '', digits : '' },
                'confirm' : { required : '' }
            },

            submitHandler : function(form) {
                var data = jQuery(form).serializeArray();
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/apply-form/partner',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();
                            jQuery('.popup_partner_form .close').click();

                            showSuccessMessage(Translator.t('Спасибо, ваша заявка принята!'));

                        } else {
                            // todo:
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {}
        });
    }, // end initFormPartnerValidation

    /*
     Process handling of subscribe forms on the website
     */
    initSubscriberValidation: function()
    {
        var $validator = jQuery('#apply_rss_subscriber').validate({
            rules: {
                'email' : { required : true, email: true, maxlength: 32 }
            },

            messages: {
                'email' : { required : '', email: '' }
            },

            submitHandler : function(form) {
                var data = jQuery(form).serializeArray();
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/apply-form/subscriber',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();

                            showSuccessMessage(Translator.t('Спасибо, ваша подписка принята!'));

                        } else {
                             if (response.exist) {
                                 // todo: alert message
                                 showSuccessMessage(Translator.t('Пользователь с введенным email существует!'));
                             } else {
                                 //todo:
                             }
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {}
        });
    }, // end initSubscriberValidation

    /*
    Get cities by region
     */
    filterCitiesByRegion: function(context)
    {
        jQuery.ajax({
            url:        '/async/get-cities-by-region',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       {id_region: jQuery(context).val()},
            success:    function(response) {
                if (response.status) {
                    jQuery('select[name="city"]').selecter('destroy').replaceWith(response.html);
                    jQuery('select[name="city"]').selecter({cover: true});
                }
            }
        });
    }
};

jQuery(document).ready(function() {
    ApplyForm.init();
});
