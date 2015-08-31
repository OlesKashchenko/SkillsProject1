'use strict';

var App =
{

    lang: 'ua',
    token: '',


    init: function()
    {
        App.initCustomPopups();
    }, // end init

    getUrlParameter: function(param)
    {
        var pageURL = window.location.search.substring(1);
        var urlVariables = pageURL.split('&');

        for (var i = 0; i < urlVariables.length; i++) {
            var parameterName = urlVariables[i].split('=');

            if (parameterName[0] == param) {
                return parameterName[1];
            }
        }
    }, // end getUrlParameter

    changeLocale: function(locale)
    {
        jQuery.ajax({
            type: "POST",
            url: '/app/change-locale',
            data: {
                locale: locale,
                url: window.location.pathname + window.location.search + window.location.hash
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    window.location = response.link;
                } else {
                    // fixme:
                    alert(Translator.t('Что-то пошло не так'));
                }
            }
        });
    }, // end changeLocale

    redirectTo: function(url)
    {
        window.location = url;
    }, // end redirectTo

    bindCustomCheckboxes: function (selector)
    {
        $(selector).on('click', 'label.custom_checkbox', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if ($(this).hasClass('checked')) {
                $(this).removeClass('checked').find('input').prop('checked', '');
            } else {
                $(this).addClass('checked').find('input').prop('checked', 'checked');
            }
        });
    },

    initChangeYear: function()
    {
        var idYear = $('.year_select').find(':selected').data('id-year');

        jQuery('.investor_reports_tabs').hide();
	    jQuery('.tab_inner').find("ul").css("max-height", "99999px");
        jQuery('.investor_reports_tabs[data-id-year=' + idYear + ']').show();
        jQuery('.investor_reports_tabs[data-id-year=' + idYear + ']').find('.js_tabs_head .tab.act').click();
        
    },

    initChangeYearPresentation: function()
    {
        var idYear = $('.years_select').find(':selected').data('id-year');
	    //var slider = $('.bxslider').bxSlider();

        jQuery('.slider_holder').hide();
	    jQuery('.slider_holder[data-id-year=' + idYear + ']').show();
	        //slider.reloadSlider();
	    //jQuery.redrawSlider();
	    //setTimeout(function(){$(window).resize(); console.log('aaaa')}, 200);


    },

    initChangeFeedback: function()
    {
        var idFeedback = $('#inputFeedbackSearch').val();

        jQuery('.faq_block').hide();
        if (idFeedback == "") {
            jQuery('#feedback').show();
        } else {
            jQuery('.faq_block[data-id-feedback=' + idFeedback + ']').show();
        }
    },

    initCustomPopups: function()
    {
        jQuery('a.custom-popup-link').click(function() {
            var content = jQuery(this).next().html();

            jQuery('.custom-popup .popup_content p').html(content);

            showPopup('.custom-popup');
        });
    } // end initCustomPopups
};

jQuery(document).ready(function() {
    App.init();
});
