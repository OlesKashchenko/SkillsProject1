'use strict';

var Deposit =
{
    formCompare: function()
    {
        jQuery.ajax({
            type: "GET",
            url: '/form-deposit-compare',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    jQuery('.popup_deposits_compare .popup_content').html(response.html);
                }
            }
        });
    } // end formCompare
};
