'use strict';

var Card =
{

    init: function()
    {
        Card.initFilter();
    }, // end init

    addToCompare: function(id, context)
    {
        jQuery.ajax({
            type: "POST",
            url: '/async/add-card-to-compare',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    jQuery(context).removeClass('act');
                    jQuery(context).next().addClass('act');

                    jQuery('#cards-compare-container').html(response.html);

                    if (response.active) {
                        jQuery('.credit_card_compare_footer .btn_yellow').removeClass('disabled');
                    } else {
                        jQuery('.credit_card_compare_footer .btn_yellow').addClass('disabled');
                    }

                    initPopups();

                    showSuccessMessage(Translator.t('Карта добавлена к сравнению!'));

                } else {
                    // todo:
                }
            }
        });
    }, // end addToCompare

    removeFromCompare: function(id, context, popup)
    {
        jQuery.ajax({
            type: "POST",
            url: '/async/remove-card-from-compare',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    jQuery(context).removeClass('act');
                    jQuery(context).prev().addClass('act');

                    jQuery('#cards-compare-container').html(response.html);

                    if (response.active) {
                        jQuery('.credit_card_compare_footer .btn_yellow').removeClass('disabled');
                    } else {
                        jQuery('.credit_card_compare_footer .btn_yellow').addClass('disabled');
                    }

                    if (popup != undefined && popup) {
                        var cardContainer = jQuery('.credit_card_catalog_list li[data-id-card="' + id + '"]');

                        cardContainer.find('.card_add').addClass('act');
                        cardContainer.find('.card_remove').removeClass('act');
                    }

                    initPopups();

                    showSuccessMessage(Translator.t('Карта удалена из сравнения!'));

                } else {
                    // todo:
                }
            }
        });
    }, // end removeFromCompare

    formCompare: function()
    {
        if (jQuery('.credit_card_compare_footer .btn_yellow').hasClass('disabled')) {
            return false;
        }

        jQuery.ajax({
            type: "GET",
            url: '/async/form-card-compare',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    jQuery('.popup_card_compare .popup_content').html(response.html);
                }
            }
        });
    }, // end formCompare

    initFilter: function()
    {
        jQuery('.credit_card_catalog_filter .filter_item').click(function() {
            jQuery('.credit_card_catalog_filter .filter_item').removeClass('act');
            jQuery(this).addClass('act');

            var idCategory = parseInt(jQuery(this).data('id-category'));

            var cards = jQuery('.credit_card_catalog_list li');
            if (idCategory) {
                cards.hide();
                cards.each(function() {
                    if (jQuery.inArray(idCategory, jQuery(this).data('id-category')) != -1) {
                        jQuery(this).show();
                    }
                });

            } else {
                cards.show();
            }
        });
    } // end initFilter
};

jQuery(document).ready(function() {
    Card.init();
});
