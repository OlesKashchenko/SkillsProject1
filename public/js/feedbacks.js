'use strict';

var Feedbacks =
{

    token: '',
    errorFieldColor: '#FFCCCC',


    init: function()
    {
        Feedbacks.initPrivateFormValidation();
        Feedbacks.initClientFormValidation();

        if (jQuery('#inputFeedbackSearch').length) {
            Feedbacks.initFilter();
        }
    }, // end init

    initPrivateFormValidation: function()
    {
        jQuery('body').css('background', Feedbacks.errorFieldColor).css('background', '#fff');

        var $validator = jQuery('#feedback_form_private').validate({
            rules: {
                'last_name' : {
                    required : true
                },
                'first_name' : {
                    required : true
                },
                'patronymic_name' : {
                    required : true
                },
                'phone_number' : {
                    required : true,
                    digits : true,
                    maxlength: 7
                },
                'email' : {
                    required : true,
                    email: true,
                    maxlength: 32
                },
                'question' : {
                    required : true
                }
            },

            messages: {
                'last_name' : {
                    required : ''
                },
                'first_name' : {
                    required : ''
                },
                'patronymic_name' : {
                    required : ''
                },
                'phone_number' : {
                    required : '',
                    digits : '',
                    maxlength: ''
                },
                'email' : {
                    required : '',
                    email: '',
                    maxlength: ''
                },
                'question' : {
                    required : ''
                }
            },

            submitHandler : function(form) {
                var data = jQuery('#feedback_form_private').serializeArray();
                data.push({name: "type", value: "private"});
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/feedback/send',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();

                            showSuccessMessage(Translator.t('Спасибо, ваш вопрос принят!'));

                        } else {
                            // todo:
                            showSuccessMessage(Translator.t('Что-то пошло не так'));
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {
                element.css('background', ApplyForm.errorFieldColor);
            }
        });
    }, // end initPrivateFormValidation

    initClientFormValidation: function()
    {
        jQuery('body').css('background', Feedbacks.errorFieldColor).css('background', '#fff');

        var $validator = jQuery('#feedback_form_client').validate({
            rules: {
                'name' : {
                    required : true
                },
                'phone_number' : {
                    required : true,
                    digits : true,
                    maxlength: 7
                },
                'email' : {
                    required : true,
                    email: true,
                    maxlength: 32
                },
                'question' : {
                    required : true
                }
            },

            messages: {
                'name' : {
                    required : ''
                },
                'phone_number' : {
                    required : '',
                    digits : '',
                    maxlength: ''
                },
                'email' : {
                    required : '',
                    email: '',
                    maxlength: ''
                },
                'question' : {
                    required : ''
                }
            },

            submitHandler : function(form) {
                var data = jQuery('#feedback_form_client').serializeArray();
                data.push({name: "type", value: "client"});
                data.push({name: "_token", value: App.token});

                jQuery.ajax({
                    url:        '/feedback/send',
                    type:       'POST',
                    dataType:   'json',
                    cache:      false,
                    data:       data,
                    success:    function(response) {
                        if (response.status) {
                            jQuery(form)[0].reset();

                            showSuccessMessage(Translator.t('Спасибо, ваша заявка принята!'));

                        } else {
                            // todo:
                            showSuccessMessage(Translator.t('Что-то пошло не так'));
                        }
                    }
                });
            },

            errorPlacement : function(error, element) {
                element.css('background', ApplyForm.errorFieldColor);
            }
        });
    }, // end initPrivateFormValidation

    initFilter: function()
    {
            var inputCategory = jQuery('#inputFeedbackSearch').val().trim();
            if (inputCategory) {
                var questions = jQuery('.faq_question');

                questions.hide();
                questions.each(function() {
                    var titleCategory = jQuery(this).data('title-category').trim();
                    if (titleCategory.indexOf(inputCategory) > -1) {
                        jQuery(this).show();
                    }
                });

            } else {
                jQuery('.faq_question ').show();
            }

    } // end initFilter
};

jQuery(document).ready(function() {
    Feedbacks.init();
});
