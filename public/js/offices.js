'use strict';

var Offices =
{

    init: function()
    {

    }, // end init

    importOffices: function()
    {
        var data = new FormData(jQuery('#offices-import')[0]);

        jQuery.ajax({
            url:            '/admin/handle/offices-import',
            type:           'POST',
            dataType:       'json',
            cache:          false,
            data:           data,
            contentType:    false,
            processData:    false,
            success:    function(response) {
                if (response.status) {
                    jQuery('#offices-import')[0].reset();

                    jQuery.smallBox({
                        title : "Отделения успешно загружены!",
                        content : "",
                        color : "#659265",
                        iconSmall : "fa fa-check fa-2x fadeInRight animated",
                        timeout : 4000
                    });
                } else {
                    jQuery.smallBox({
                        title : "Что то пошло не так.",
                        content : "",
                        color : "#659265",
                        iconSmall : "fa fa-check fa-2x fadeInRight animated",
                        timeout : 4000
                    });
                }
            }
        });
    } // importOffices
};

jQuery(document).ready(function() {
    Offices.init();
});
