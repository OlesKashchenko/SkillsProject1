'use strict';

var ApplyDepositForm =
{

    init: function()
    {
        ApplyDepositForm.bind();
    }, // end init

    activateStep: function(step)
    {
        var disable_step = step === 1 ? 2 : 1;
        $('.form_apply_deposit').removeClass('step_'+disable_step).addClass('step_'+step);
    }, // end activateStep

    bind: function()
    {
        jQuery('[data-form-show="apply_form_deposit"]').on('click', function (e) {
            var popupContent;
            e.preventDefault();
            popupContent = jQuery(this).closest('.form_controls').find('.popup_content').html();
            jQuery('.form_apply_deposit_page.page_1').html(popupContent);
            ApplyDepositForm.activateStep($(this).data('step'));
            showPopup('#popup_apply_form_deposit');
        });

        $('.form_apply_deposit').on('click', '.form_go_next_step', function(e) {
            e.preventDefault();
            ApplyDepositForm.activateStep(2);
        });

        $('.form_apply_deposit').on('click', '.form_go_prev_step', function(e) {
            e.preventDefault();
            ApplyDepositForm.activateStep(1);
        });

        App.bindCustomCheckboxes('#popup_apply_form_deposit');
    } // end bind
};

jQuery(document).ready(function() {
    ApplyDepositForm.init();
});
