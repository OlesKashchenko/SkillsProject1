// fixme:
function initPopups()
{
    $('#back').click(hidePopup);

    $('.popup').each(function(index, popup){
        $(popup).find('.close').click(hidePopup);
        $('.popup_holder').hide().removeClass('none');
        $(popup).hide().removeClass('none');
    });

    if( visible_popup.length ){
        showPopup('.'+visible_popup);
    }

    // popup btns
    $('[data-popup]').click(function(e){
        e.preventDefault();
        var popup_class = $(this).data('popup'),
            popup_id    = $(this).data('id');

        showPopup('.' + popup_class, popup_id);
    });
}

function showPopup(popup, id)
{
    if ( $(popup).hasClass('act') ) return;

    if ( $(popup).hasClass('popup_atms') ) initAtmMap();

    if( $('body').hasClass('body_popup') ){
        // we have active popup
        $('.popup.act')
            .fadeOut(duration,function(){
                $(popup).fadeIn(duration);
                $(popup).addClass('act');
            })
            .removeClass('act');
    } else {
        // no visible popup
        document_scroll = $(window).scrollTop();
        $('body').addClass('body_popup');
        $('.wrapper').scrollTop(document_scroll);
        $(window).scrollTop(0);

        if (id) {
            $(popup + "[data-id='" + id + "']").show().addClass('act');
        } else {
            $(popup).show().addClass('act');
        }

        $('.popup_holder').stop(1,1).fadeIn(duration);
    }
}

/*alexkor 20.07.2015*/

/*mobile*/
var useragents=['android','astel','audiovox','blackberry','chtml','docomo','ericsson','hand','iphone ','ipod','2me','ava','j-phone','kddi','lg','midp','mini','minimo','mobi','mobile','mobileexplorer','mot-e',       'motorola','mot-v','netfront','nokia', 'palm','palmos','palmsource','pda','pdxgw','phone','plucker','portable','portalmmm','sagem','samsung','sanyo','sgh','sharp','sie-m','sie-s','smartphone','softbank','            sprint','symbian','telit','tsm','vodafone','wap','windowsce','wml','xiino'];

var agt=navigator.userAgent.toLowerCase();
var is_mobile=false;
for(i=0;i<useragents.length;i++){
    if(agt.indexOf(useragents[i])!=-1){
        is_mobile=true;
        user_agent=agt; break;
    }
}

/*!mobile*/


$(function(){
    

    if (is_mobile)
    {
        tap_event_start='click';
        tap_event_end='mouseleave';
    } else
    {
        tap_event_start='mouseenter';
        tap_event_end='mouseleave';
    }

    /*-------*/
    if ( $('.credit_catalog_block_item_info').length )
    {
        $('.credit_catalog_block_item_info').mouseenter(function()
        {
            $(this).find('.credit_catalog_info').addClass('active');
        });

        $('.credit_catalog_block_item_info').mouseleave(function()
        {
            $(this).find('.credit_catalog_info').removeClass('active');
        });
    }
    /*-------*/

    /*-------*/
    if ( $('.transfers_catalog_block_item_info').length )
    {
        $('.transfers_catalog_block_item_info').mouseenter(function()
        {
            $(this).find('.transfers_catalog_info').addClass('active');
        });

        $('.transfers_catalog_block_item_info').mouseleave(function()
        {
            $(this).find('.transfers_catalog_info').removeClass('active');
        });
    }
    /*-------*/

    /*-------*/
    if ( $('.credit_card_catalog_list').length )
    {
        $('.credit_card_catalog_list .card_info').mouseenter(function()
        {
            $(this).closest('li').find('.card_bg').addClass('active');
        });

        $('.credit_card_catalog_list .card_info').mouseleave(function()
        {
            $(this).closest('li').find('.card_bg').removeClass('active');
        });
    }
    /*-------*/

    /*-------*/
    if ( $('.business_catalog_block_item_info').length )
    {
        $('.business_catalog_block_item_info').mouseenter(function()
        {
            $(this).addClass('active');
        });

        $('.business_catalog_block_item_info').mouseleave(function()
        {
            $(this).removeClass('active');
        });
    }
    /*-------*/

    /*-------*/
    if ( $('.business_catalog_list li').length )
    {
        $('.business_catalog_list li').mouseenter(function()
        {
            $(this).addClass('active');
        });

        $('.business_catalog_list li').mouseleave(function()
        {
            $(this).removeClass('active');
        });
    }
    /*-------*/

    /*-------*/
    if ( $('.business_page_offers_item').length )
    {
        $('.business_page_offers_item').removeClass('active');

        $('.business_page_offers_item').on(tap_event_start,function(e)
        {
            var _this = $(this);

            if (is_mobile) {
                if (_this.hasClass('active')) {
                    location.href = _this.attr('href');
                } else {
                    e.preventDefault();
                }
            }

            _this.addClass('active');

        });

        $('.business_page_offers_item').on(tap_event_end,function()
        {
            var _this = $(this);

            if (!is_mobile) {
                _this.removeClass('active');
            }

        });
    }
    /*-------*/
    
})

/*alexkor 20.07.2015*/

