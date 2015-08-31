'use strict';

var Press =
{

    isItemsExists: false,
    filterParams: {},

    init: function()
    {
        Press.checkFilterParams();
        Press.initAddNextItems();
    }, // end init

    checkFilterParams: function()
    {
        var filterYear = App.getUrlParameter('year'),
            filterCategories = App.getUrlParameter('categories');

        if (filterYear || filterCategories) {
            jQuery('.news_all_filter').click();
        }


    }, // end parseFilterParams

    doFilter: function()
    {
        // supahack for checkboxes triggers
        setTimeout(function() {
            jQuery('#filter-params').submit();
        }, 50);
    }, // end doFilter

    initAddNextItems: function()
    {
        if ($('.page_news_all_add').length) {
            var holders         = jQuery('.page_news_all_add'),
                spinner         = jQuery('.page_news_all_spinner'),
                itemsContainer  = jQuery('.page_news_all_wrapper'),
                categoriesIds   = [];

            jQuery("input[name='categories[]']").each(function() {
                if (jQuery(this).is(':checked')) {
                    categoriesIds.push(jQuery(this).val());
                }}
            );

            holders.click(function() {
                spinner.addClass('is_loading');
				//console.log('year- ' + jQuery("select[name='year']").val() +' '+'categotyids- '+ categoriesIds +" "+ 'skip- '+ jQuery('#load-skip-items').val().trim());
                jQuery.ajax({
                    type: "POST",
                    url: '/about/press/load',
                    data: {
                        year:       jQuery("select[name='year']").val(),
                        categories: categoriesIds,
                        skip:       jQuery('#load-skip-items').val().trim(),
                        id_catalog: jQuery('#load-id-catalog').val().trim()
                    },
                    dataType: 'json',
                    success: function(response) {
                        spinner.removeClass('is_loading');

                        if (response.status) {
                            jQuery(response.html).appendTo(itemsContainer);

                            jQuery('#load-skip-items').val(response.skip);

                            if (!response.exist) {
                                spinner.hide();
                                spinner.next().hide();
                            }
                        } else {
                            // todo:
                            showSuccessMessage(Translator.t('Что-то пошло не так'));
                        }
                    }
                });
            });
        }
    } // end initAddNextItems
};

jQuery(document).ready(function() {
    Press.init();
});