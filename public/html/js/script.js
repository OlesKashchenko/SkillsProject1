var duration = 600;

var visible_popup = '';
var document_scroll;

function trim(string){
    return string.replace(/(^\s+)|(\s+$)/g, "");
}

if(!Array.indexOf){
    Array.prototype.indexOf = function(obj){
        for(var i=0; i<this.length; i++){
            if(this[i]==obj){
                return i;
            }
        }
        return -1;
    }
}

function setAutoRemoveFormElement( element, def_val, placeholder ) {
    if (!$(element)) return false;

    $(placeholder).click(function(){$(element).focus()});

    $(element).focus(function() {
        if ($(this).val() == def_val) {
            $(this).val('');
            $(placeholder).fadeOut(100);
        }
    });
    $(element).blur(function() {
        if (trim($(this).val()) == '') {
            $(this).val(def_val);
            $(placeholder).parent().removeClass('show_ok');
            $(placeholder).fadeIn(100);
        } else {
            $(placeholder).hide();
            $(placeholder).parent().addClass('show_ok');
        }
    });

    if ($(element).val() == '') {
        $(element).val(def_val);
        $(placeholder).show().removeClass('none');
    } else {
        $(placeholder).hide().removeClass('none');
    }
    return $(element);
}

function initPopups(){
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
        var popup_class = $(this).data('popup');
        showPopup('.'+popup_class);
    });
}
function hidePopup(){
    $('.popup_holder').fadeOut(duration,function(){
        $('.popup.act').removeClass('act').hide();
        $('.wrapper').scrollTop(0);
        $('body').removeClass('body_popup');
        $('body').scrollTop(document_scroll);
    });
}
function showPopup(popup){
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

        $(popup).show().addClass('act');
        $('.popup_holder').stop(1,1).fadeIn(duration);
    }
}
function initShowSubmenuPopup() {
    var $showSubmenu = $('.submenu_show');
    var $hideSubmenu = $('.close_submenu');

    $showSubmenu.click(function(){
        $('.submenu_popup').removeClass('show');
        $(this).parent().find('.submenu_popup').addClass('show');
    });
    $hideSubmenu.click(function(){
        $(this).parent().removeClass('show');
    });
}

function showSuccessMessage(message) {
    if (typeof message != "string") return;

    var $holder = $('<div class="alert_message success">' + message + '</div><br/>');

    $('.alert_messages_holder').append($holder);
    setTimeout(function() { $holder.addClass('act'); }, 100);
    setTimeout(function() { $holder.remove(); }, 5000);
}

function scrollTo(target, scroll_duration) {
    if (typeof target == 'undefined') return;
    if (typeof scroll_duration == 'undefined') scroll_duration = duration;

    target = '.'+target;
    if ($(target).length) {
        $('html, body').stop(1,1).animate({
            //scrollTop: $(target).first().offset().top
            scrollTop: $(target).first().offset().top - $('.nav_links').height()
        }, scroll_duration);
    }
}

function initBtnsHover() {
    $('.btn').each(function(i, btn) {
        var text = trim($(btn).text()) || $(btn).find('input').val() || '';
        $(btn).attr('data-text', text);
    });
}

function initNavWaypoints() {
    var $sidebar = $('.nav_sidebar');
    var $burger = $('.nav_sidebar_burger');
    var $nav = $('.nav_main');
    var $navInner = $('.nav_main_inner');
    var $navLinks = $nav.find('.nav_links a');
    var $navSubsHolder = $nav.find('.nav_main_sub');
    var $navSubs = $nav.find('.nav_main_sub_item');
    var $navSideBarIcon = $nav.find('.fake_sidebar_icon');
    var $doc = $(document);
    var $body = $('body');
    var $wrapper = $('.wrapper');
    var isSidebarMinimized = $sidebar.hasClass('minimized');
    isSidebarMinimized && $nav.addClass('has_sidebar_icon');
    var isSidebarOpen = false;
    var sidebarStartPos = parseInt($sidebar.css('top'), 10);
    var navStartPos = $nav.offset().top + $nav.height();
    var isNavFixed = $nav.hasClass('fixed');

    function update() {
        if ( $body.hasClass('body_popup') ) return;
        var scrollTop = $doc.scrollTop();
        var scrollLeft = $doc.scrollLeft();

        // main nav
        if (scrollTop > navStartPos) {
            if ( !isNavFixed ) {
                $nav.addClass('fixed');
                isNavFixed = true;
                $navLinks.removeClass('act');
            }
            $navInner.css({ 'margin-left': (scrollLeft >= 0 ? scrollLeft : 0) * -1});
        } else {
            if ( isNavFixed ) {
                $nav.removeClass('fixed');
                $navInner.css({'margin-left': ''});
                isNavFixed = false;
            }
            else if ( $wrapper.hasClass('page_index') ) {
                $navLinks.eq(0).addClass('act');
            }
        }



        // sidebar
        if ( isSidebarMinimized ) {
            if ( isNavFixed ) {
                //$nav.addClass('has_sidebar_icon');
                isSidebarOpen && $sidebar.addClass('fixed');
            } else {
                //$nav.removeClass('has_sidebar_icon');
                $sidebar.removeClass('fixed');
                $sidebar.css({
                    top: Math.max(0, sidebarStartPos - (scrollTop >= 0 ? scrollTop : 0))
                });
            }
        } else {
            $sidebar.css({
                top: Math.max(0, sidebarStartPos - (scrollTop >= 0 ? scrollTop : 0))
            });
        }
    }

    function sidebarOpen() {
        isSidebarOpen = true;
        $sidebar.addClass('fixed hover');
        $burger.bind('click', sidebarClose);
        update();
    }
    function sidebarClose(e) {
        e.stopPropagation();
        $sidebar.removeClass('fixed hover');
        $burger.unbind('click', sidebarClose);
        isSidebarOpen = false;
    }

    if ( isSidebarMinimized ) {
        // sidebar open if hover on fake sidebar icon
        $navSideBarIcon.bind('click', sidebarOpen);
        $sidebar.bind('click', sidebarOpen);
    }

    $navLinks.bind('mouseenter', function() {
        var index = $navLinks.index(this);
        if ( $nav.hasClass('fixed') || $nav.hasClass('short') ) {
            $navLinks.removeClass('hover').eq(index).addClass('hover');
            $navSubs.removeClass('hover').eq(index).addClass('hover');
            $navSubsHolder.addClass('hover');
        } else {
            $navLinks.removeClass('act').eq(index).addClass('act');
            $navSubs.removeClass('act').eq(index).addClass('act');
        }
    });
    $nav.bind('mouseleave', function() {
        if ( $nav.hasClass('fixed') || $nav.hasClass('short') ) {
            $navLinks.removeClass('hover');
            $navSubs.removeClass('hover');
            $navSubsHolder.removeClass('hover');
        } else if ( $wrapper.hasClass('page_index') ){
            $navLinks.removeClass('act').eq(0).addClass('act');
            $navSubs.removeClass('act').eq(0).addClass('act');
        }
    });

    $(window).scroll(update).resize(update);
}

function initMainPromoSliders() {
    var $holder = $('.main_promo');
    var $sliders = $holder.find('.bxslider > ul');

    $sliders.each(function(i, slider) {
        $(slider).bxSlider();
    });
}

function initMainNewsTabs() {
    var $holder = $('.main_news');

    var $tabs = $holder.find('.main_news_tabs_item');
    var $tabsContainers = $holder.find('.main_news_tabs_body_item');

    function initSlider(slider) {
        $(slider).find('.bxslider > ul').bxSlider({
            pager: false,
            infiniteLoop: false,
            hideControlOnEnd: true
        });
    }

    $tabs.click(function(e) {
        e.preventDefault();

        if ( !$(this).hasClass('act') ) {
            var index = $tabs.index(this);
            $tabs.removeClass('act').eq(index).addClass('act');
            $tabsContainers.removeClass('act').eq(index).addClass('act');

            if ($tabsContainers.eq(index).attr('slider-inited') != 'true') {
                initSlider($tabsContainers.eq(index));
                $tabsContainers.eq(index).attr('slider-inited', 'true');
            }
        }
    });
    $tabs.eq(0).click();
}

function initCalculatorsHelpers() {
    $('.input_helper_draggable').each(function(i, el) {
        var min = $(el).data('min') || 0;
        var max = $(el).data('max') || 100;

        $(el).slider({
            create: function( event, ui ) {
                var $bar = $('<div class="bar"></div>');
                $bar.prependTo(this);

                var $field = $(this).closest('.field');

                // focus state for whole field
                $field.find('input, .ui-slider-handle')
                    .bind('focus', function() { $(this).closest('.field').addClass('field-focus'); })
                    .bind('blur',  function() { $(this).closest('.field').removeClass('field-focus'); });

                // update draggable if input changed
                $field.find('input')
                    .keydown(function(e) {
                        if ( // respond only to these keys
                            (e.keyCode >= 48 && e.keyCode <= 57)  || // regular numbers
                            (e.keyCode >= 96 && e.keyCode <= 105) || // numpad numbers
                             e.keyCode == 8  || e.keyCode == 46   || // delete, backspace
                             e.keyCode == 35 || e.keyCode == 36   || // home, end
                             e.keyCode == 27 || e.keyCode == 116  || // esc, f5
                            (e.keyCode >= 37 && e.keyCode <= 40)     // arrows
                            ) {
                            // all is ok
                        } else {
                            e.preventDefault();
                        }
                    }).keyup(function(e) {
                        var val = Math.round(($(this).val() - min) / (max - min) * 100);
                        (val < 0)   && (val = 0);
                        (val > 100) && (val = 100);

                        $field.find('.ui-slider-handle').css({ 'left': val + '%' });
                        $field.find('.bar').css({ 'right': (100 - val) + '%' });
                    });
            },
            change: function(e, ui) {
                $(this).closest('.field').find('input').val( Math.round(ui.value * (max - min) / 100) + min );
                $(this).find('.bar').css({ 'right': (100 - ui.value) + '%' });
            },
            slide: function(e, ui) {
                $(this).closest('.field').find('input').val( Math.round(ui.value * (max - min) / 100) + min );
                $(this).find('.bar').css({ 'right': (100 - ui.value) + '%' });
            }
        });
    });
}

function initTabs() {
    var $holder = $('.js_tabs');

    $holder.each(function(i, tabber) {
        var $tabs = $(tabber).find('.js_tabs_head .tab');
        var $slides = $(tabber).find('.js_tabs_body .tab');

        $tabs.click(function() {
            var index = $tabs.index(this);
            $tabs.removeClass('act').eq(index).addClass('act');
            $slides.removeClass('act').eq(index).addClass('act');

            if ($(tabber).data('autoheight') == 1 || $(tabber).data('autoheight') == 'true') {
                $(tabber).css({
                    height: 130 + Math.max(50, $slides.eq(index).find('.tab_inner').outerHeight())
                });

            }
        }).eq(0).click();
    });
}

function initBankingSliders() {
    var $holder = $('.banking_slider_block');

    $holder.each(function(i, slider) {
        var $slider = $(slider).find('.bxslider');
        $slider.bxSlider({
            infiniteLoop: false,
            hideControlOnEnd: true,
            mode: ($slider.data('animation') || 'horizontal')
        });
    });
}

function initToggleBlock() {
    var $holder = $('.toggle_block');

    $holder.each(function(i, holder) {
        var $body = $(holder).find('.toggle_block_body');
        var $footer = $(holder).find('.toggle_block_footer');

        $body.css({
            'max-height': $body.find('.toggle_block_body_inner').outerHeight()
        });
        $footer.click(function() {
            $(holder).toggleClass('closed');
        });
    });
}

function initToggleFaq() {
    var $holder = $('.faq_block');

    $(window).load(function() {
        $('.faq_question').addClass('closed');
        $('.faq_text').each(function(i, text) {
            $(text).css('max-height', $(text).find('.faq_text_inner').outerHeight());
        });
    });

    $holder.each(function(i, block) {
        var $questions = $(block).find('.faq_question');
        var $titles = $(block).find('.faq_title');

        $titles.click(function() {
            var index = $titles.index(this);

            if ( $questions.eq(index).hasClass('closed') ) {
                $questions.addClass('closed').eq(index).removeClass('closed');
            } else {
                $questions.eq(index).addClass('closed');
            }
        });
    });
}

function initToggleNews() {
    var $holder = $('.investor_doc_block');

    $(window).load(function() {
        $('.investor_doc_question').addClass('closed');
        $('.investor_doc_text').each(function(i, text) {
            $(text).css('max-height', $(text).find('.investor_doc_text_inner').outerHeight());
        });
    });

    $holder.each(function(i, block) {
        var $questions = $(block).find('.investor_doc_question');
        var $titles = $(block).find('.investor_doc_title');

        $titles.click(function() {
            var index = $titles.index(this);

            if ( $questions.eq(index).hasClass('closed') ) {
                $questions.addClass('closed').eq(index).removeClass('closed');
            } else {
                $questions.eq(index).addClass('closed');
            }
        });
    });
}

function initCirclePies() {
    var $holders = $('.circle_pie');
    $holders.each(function (i, el){
        var angle = $(el).data('angle');
        var $spinner = $(el).find('.spinner');
        var $filler = $(el).find('.filler');
        var $mask = $(el).find('.mask');

        $filler.hide();

        $(window).load(function(){
            setTimeout(function(){
                if (angle <= 180){
                    $spinner.css({
                        '-webkit-transform': 'rotate('+ angle +'deg)',
                        'transform': 'rotate('+ angle +'deg)'
                    });
                } else {
                   setTimeout(function(){
                       $mask.hide();
                       $filler.show();
                   }, 500);
                    $spinner.css({
                        '-webkit-transform': 'rotate('+ angle +'deg)',
                        'transform': 'rotate('+ angle +'deg)'
                    });

                }
            },500);
        });

    });

}
function initAddAllNews() {
    var $holders = $('.page_news_all_add');
    var $bodyNews = $holders.parent().find('.page_news_all_wrapper');
    var $spinner = $('.page_news_all_spinner');

    $holders.click(function() {
        $spinner.addClass('is_loading');
        setTimeout(function(){
            $spinner.removeClass('is_loading');
            $bodyNews.find('.page_news_all_holder').eq(1).clone().appendTo($bodyNews);
            $bodyNews.find('.page_news_all_holder').eq(0).clone().appendTo($bodyNews);
        }, 1000);
    });
}
function initFilterAllNews() {
    var $showFilter = $('.news_all_filter');
    $showFilter.click(function(){
        $('.news_all_filter_div').toggleClass('show_filter');
    });

}

function initMainAchievementsSlider() {
    var $holder = $('.main_achievements');
    var $slides = ''; // var is reserved. it will be set after slider is created.
    var $dragHolder = $holder.find('.drag_slider_controls');
    var $dragBar = $dragHolder.find('.drag_slider_controls_dragbar');
    var $dragbox = ''; // var is reserved. it will be set after dragbox is created.
    var setActTimeout = null;

    var slider = $holder.find('.bxslider > ul').bxSlider({
        controls: false,
        pager: false,
        onSliderLoad: function() {
            // add first and last years under the bar
            $slides = $holder.find('.bx-viewport > ul > li:not(.bx-clone)');
            $('<div class="year_start">' + $slides.first().data('year') + '</div>').appendTo($dragBar);
            $('<div class="year_end">' + $slides.last().data('year') + '</div>').appendTo($dragBar);

            // convert dragbox value to slide number
            function getActIndex(val) {
                return Math.round(val * ($slides.length - 1) / 100);
            }

            function setActSlide(index) {
                if (slider.getCurrentSlide() != index) {
                    slider.goToSlide(index);
                    setActTimeout && clearTimeout(setActTimeout);
                    setActTimeout = setTimeout(function(){ setActSlide(index); },500);
                }
            }
            // init dragbox
            $dragBar.slider({
                create: function( event, ui ) {
                    $dragbox = $(this).find('.ui-slider-handle');
                    $dragbox.html( $slides.first().data('year') );
                },
                slide: function( event, ui ) {
                    var index = getActIndex(ui.value);
                    $dragbox.html( $slides.eq(index).data('year') );
                    setActSlide(index);
                }
            });
        }
    });
}

function initSitemap() {
    var $holder = $('.sitemap');
    //var $toggleLink = $('.sitemap_link');
    var $tabs = $holder.find('.sitemap_tabs a');
    var $tabsItems = $holder.find('.sitemap_tabs_body_item');
    //var scrollTimeout = null;

    // toggle sitemap on/off
    /*function toggleSitemap(e) {
        e.preventDefault();

        if ( $toggleLink.hasClass('act') ) {
            $toggleLink.removeClass('act');
            $holder.removeClass('act').css({
                'max-height': ''
            });
            scrollTimeout && clearTimeout(scrollTimeout);
            scrollTimeout = null;
        } else {
            $toggleLink.addClass('act');
            $holder.addClass('act').css({
                'max-height': $tabsItems.filter('.act').height()
            });
            scrollTimeout = setTimeout(function() {
                scrollTimeout = null;
                $('html, body').animate({
                    scrollTop: $toggleLink.offset().top
                });
            }, 500);
        }
    }
    $toggleLink.click(toggleSitemap);*/

    // init sitemap tabs
    $tabs.click(function(e){
        e.preventDefault();
        var index = $tabs.index(this);
        $tabs.removeClass('act').eq(index).addClass('act');
        $tabsItems.removeClass('act').eq(index).addClass('act');
        $holder.css({
            'max-height': $tabsItems.eq(index).height()
        })
    });
    $tabs.eq(0).addClass('act');
    $tabsItems.eq(0).addClass('act');
}

function initInvestorReportsToggle() {
    $('.investor_reports').each(function(i1, block) {
        var ulHolderHeight = 0;
        var $block = $(block);
        var $listHolder = $block.find('.investor_reports_tabs_body');

        // set proper height limits for list
        $block.find('ul').each(function(i2, list) {
            var $list = $(list);
            var initHeight = 0;
            var length = Math.min(3, $list.find('li').length);
            var showMoreHeight = ($list.parent().find('.show_more').length ? $list.parent().find('.show_more').outerHeight() : 0);

            for (var i = 0; i < length; i++) {
                initHeight += $list.find('li').eq(i).outerHeight();
            }
            $list.css('max-height', initHeight);

            // calculate proper height limits for list holder
            var additionalHeight = Math.round($list.offset().top - $block.offset().top);
            if (initHeight + additionalHeight > ulHolderHeight) {
                ulHolderHeight = initHeight + additionalHeight + showMoreHeight;
            }

            // activate show_more button
            var btn = $block.find('.show_more');
            btn.click(function(e) {
                e.preventDefault();
                $list.addClass('open');
                $listHolder.data('height', $listHolder.css('height')).css('height', $list.outerHeight() + additionalHeight);
                btn.hide();
            });
            $block.find('.js_tabs_head .tab').click(function() {
                if ($list.filter('.open').length) {
                    $list.removeClass('open');
                    $listHolder.css('height', parseInt($listHolder.data('height'), 10)).data('height', '');
                    btn.show();
                }
            });

            // set proper height limits for list holder
            $listHolder.css('height', ulHolderHeight);
        });
    });
}

function initInvestorBriefSlider() {
    $('.investor_brief .bxslider').length && $('.investor_brief .bxslider').bxSlider({
        controls: false
    });
}

function initInvestorNewsSlider() {
    $('.investor_news .bxslider > ul').bxSlider({
        pager: false,
        infiniteLoop: false,
        hideControlOnEnd: true
    });
    $('.investor_news li > a:nth-child(2n-1)').addClass('odd');
}

function initInvestorCalendarSlider() {
    var $holder = $('.investor_calendar');
    var $slides = ''; // var is reserved. it will be set after slider is created.
    var $dragHolder = $holder.find('.drag_slider_controls');
    var $dragBar = $dragHolder.find('.drag_slider_controls_dragbar');
    var $dragbox = ''; // var is reserved. it will be set after dragbox is created.
    var setActTimeout = null;
    var $yearData = $holder.find('.investor_calendar_year');

    var slider = $holder.find('.bxslider > ul').bxSlider({
        controls: false,
        pager: false,
        infiniteLoop: false,
        onSliderLoad: function() {
            // add first and last years under the bar
            $slides = $holder.find('.bx-viewport > ul > li:not(.bx-clone)');
            $('<div class="year_start">' + $slides.first().data('year') + '</div>').appendTo($dragBar);
            $('<div class="year_end">' + $slides.last().data('year') + '</div>').appendTo($dragBar);

            // convert dragbox value to slide number
            function getActIndex(val) {
                return Math.round(val * ($slides.length - 1) / 100);
            }

            function setActSlide(index) {
                if (slider.getCurrentSlide() != index) {
                    slider.goToSlide(index);
                    setActTimeout && clearTimeout(setActTimeout);
                    setActTimeout = setTimeout(function(){ setActSlide(index); },500);
                }
            }

            // init dragbox
            $dragBar.slider({
                create: function( event, ui ) {
                    $dragbox = $(this).find('.ui-slider-handle');
                    $dragbox.html( $slides.first().data('year') );
                },
                slide: function( event, ui ) {
                    var index = getActIndex(ui.value);
                    $dragbox.html( $slides.eq(index).data('year') );
                    $yearData.text( $slides.eq(index).data('year') );
                    setActSlide(index);
                }
            });
        }
    });
}
function initScrollPresentation() {
    var $holderSelecter = $('.investor_brief_item .selecter-selected');
    var $selecterOptions = $('.investor_brief_item .selecter-options .selecter-item');
    var $holderSLider = $('.investor_brief_item .slider_holder');
    var $holderSliderLength = $holderSLider.length;
    var $selectedYear = $holderSelecter.text();

    $('.investor_brief_item .slider_holder[data-scroll-year='+$selectedYear+']').addClass('act');

    $selecterOptions.on('click', function(){
        var elem = $(this);
        elem.year = elem.text();
        for (var i = 0; i < $holderSliderLength; i++) {
            if ($holderSLider.eq(i).data('scroll-year') == elem.year){
                $holderSLider.removeClass('act');
                $holderSLider.eq(i).addClass('act');
            }
        }
    });
}
function initMapDraggableTime() {
    var $holder = $('.atms_block');
    var $draggable = $holder.find('.field_set_time .input_helper_draggable_time');

    function minutesToTime(minutes) {
        if (typeof minutes != "number") return '';

        var h = Math.floor(minutes / 60);
        var m = minutes - (h * 60);

        if (h < 10) { h = '0' + h; }
        if (m < 10) { m = '0' + m; }

        return h + ':' + m;
    }

    $draggable.each(function(i, el) {
        var $el = $(el);
        var min = parseInt($el.data('min'), 10) || 0;
        var max = $el.data('max') || 1440;
        var $bar = $('<div class="bar"></div>');
        var $timeCurrent = $('<div class="time-current"></div>');
        $timeCurrent.prependTo($bar);
        var $timeFrom = $('<div class="time-from"></div>');
        var $timeTo = $('<div class="time-to"></div>');

        function onHelperMove(e, ui) {
            // update thick bar length and time position
            $(this).find('.bar').css({ 'right': (100 - Math.round((ui.value - min) / (max - min) * 100)) + '%' });
            if ( ui.value == min ) {
                $el.addClass('is_min');
            } else if ( ui.value == max ) {
                $el.addClass('is_max');
            } else {
                $el.removeClass('is_min').removeClass('is_max');
            }

            // update time value
            var time = minutesToTime(ui.value);
            $timeCurrent.html(time);
            $(this).closest('.field').find('input').val(time);
        }

        $el.slider({
            min: min,
            max: max,
            step: 30,
            create: function( e, ui ) {
                $bar.prependTo(this);
                $timeFrom.prependTo(this);
                $timeTo.prependTo(this);

                $timeFrom.html(minutesToTime(min));
                $timeTo.html(minutesToTime(max));
                $timeCurrent.html(minutesToTime(min))

                $el.addClass('is_min');

                var $field = $(this).closest('.field');
                $field.find('input').val(minutesToTime(min));

                // focus state for whole field
                $field.find('input, .ui-slider-handle')
                    .bind('focus',      function() { $(this).closest('.field').addClass('field-focus'); })
                    .bind('blur',       function() { $(this).closest('.field').removeClass('field-focus'); })
                    .bind('mouseenter', function() { $(this).closest('.field').addClass('field-focus'); })
                    .bind('mouseleave', function() {
                        if (!$(this).hasClass('ui-state-active') && !$(this).hasClass('ui-state-focus'))
                            $(this).closest('.field').removeClass('field-focus');
                    });
            },
            change: onHelperMove,
            slide: onHelperMove
        });
    });
}

function initCardDragSlider() {
    var $holder = $('.credit_card_slider');
    var $sliders = $holder.find('.tape_block');

    $sliders.each(function(i, slider) {
        // set proper length for items holder
        var $slider = $(slider);
        var $sliderItemsHolder = $slider.find('.tape_items');
        var $sliderItems = $sliderItemsHolder.find('.tape_item');
        $sliderItemsHolder.css({
            width: $sliderItems.first().width() * $sliderItems.length
        });


        // prepare items_holder to be movable
        var $sliderBelt = $slider.find('.tape_holder');
        var dragDistance = 0;
        var $sliderBg = $slider.find('.tape_bg');
        var dragBgDistance = 0;
        function calculateDragDistance() {
            dragDistance = $sliderItemsHolder.width() + $sliderItemsHolder.offset().left - $sliderBelt.outerWidth() + 80; // last number = padding-right
            dragBgDistance = 3000 - $sliderItemsHolder.width() * 2; // first number is background image's actual width
        }
        $(window).resize(calculateDragDistance);
        calculateDragDistance();


        // init dragbar
        var $dragBar = $slider.find('.tape_controls');
        $dragBar.slider({
            slide: function( event, ui ) {
                if (dragDistance <= 0) return;

                $sliderBelt.css({ 'margin-left': dragDistance * ui.value / 100 * -1 });
                $sliderBg.css({ 'background-position': dragBgDistance * ui.value / 100 * -1 + 'px bottom' });
            }
        });
    });


}

function initDepositIntro() {
    var $holder = $('.deposit_page_intro');
    var $slider = $holder.find('.bxslider');

    var holderH = $(window).height() - $('.nav_main').height();
    (holderH < 600) && (holderH = 600);
    (holderH > 800) && (holderH = 800);

    $holder.css({ height: holderH});
    $slider.find('li').css({ height: holderH});

    $slider.bxSlider({
        mode: ($slider.data('animation') || 'horizontal')
    });
}

function initDepositDragSlider() {
    var $holder = $('.deposit_page_benefits');
    var $slides = ''; // var is reserved. it will be set after slider is created.
    var $dragHolder = $holder.find('.drag_slider_controls');
    var $dragBar = $dragHolder.find('.drag_slider_controls_dragbar');
    var setActTimeout = null;

    var slider = $holder.find('.bxslider').bxSlider({
        controls: false,
        pager: false,
        onSliderLoad: function() {
            $slides = $holder.find('.bx-viewport > ul > li:not(.bx-clone)');

            // convert dragbox value to slide number
            function getActIndex(val) {
                return Math.round(val * ($slides.length - 1) / 100);
            }

            function setActSlide(index) {
                if (slider.getCurrentSlide() != index) {
                    slider.goToSlide(index);
                    setActTimeout && clearTimeout(setActTimeout);
                    setActTimeout = setTimeout(function(){ setActSlide(index); },500);
                }
            }

            // init dragbox
            $dragBar.slider({
                slide: function( event, ui ) {
                    setActSlide(getActIndex(ui.value));
                }
            });
        }
    });
}

function initDepositTabsSliders() {
    var $holder = $('.deposit_page_slider_tabs');
    var $sliders = $holder.find('.bxslider');

    $sliders.each(function(i, slider) {
        var $slider = $(slider);
        $slider.bxSlider({
            infiniteLoop: false,
            hideControlOnEnd: true,
            mode: ($slider.data('animation') || 'horizontal')
        });
    });
}

function initBusinessIntroSlider() {
    var $slider = $('.business_page_intro .bxslider');

    if ( $slider.length ) {
        $slider.bxSlider({
            controls: false,
            mode: 'fade',
            responsive: false,
            onSliderLoad: function() {
                $slider.addClass('is_inited');
            }
        });
    }
}

function initBusinessNewsSlider() {
    $('.business_news .bxslider > ul').bxSlider({
        pager: false,
        infiniteLoop: false,
        hideControlOnEnd: true
    });
}

function initNewsArrowsFloat() {
    var $holder = $('.news_arrows');
    var $newsBlock = $('.news_text_block');

    var limit = {
        top: $newsBlock.offset().top + 180,
        bottom: $newsBlock.height() + $newsBlock.offset().top - 200
    };

    function update() {
        var scrollTop = $(document).scrollTop();
        var scrollLeft = $(document).scrollLeft();


        if (scrollTop > limit.top) {
            if (scrollTop < limit.bottom) {
                $holder.removeClass('bottom').addClass('fixed').css('margin-left', -scrollLeft);
                limit.bottom = $newsBlock.height() + $newsBlock.offset().top - 200;

            } else {
                $holder.addClass('bottom').css('margin-left', '');
            }
        } else {
            $holder.removeClass('bottom').removeClass('fixed').css('margin-left', '');
        }
    }

    $(window).scroll(update);
}

function initNewsSocialFloat() {
    var $holder = $('.news_social_fixed');
    var $newsBlock = $('.news_text_block');

    var limit = {
        top: $holder.offset().top -100,
        bottom: $newsBlock.height()
    };

    function update() {
        var scrollTop = $(document).scrollTop();
        var scrollLeft = $(document).scrollLeft();


        if (scrollTop > limit.top) {
            if (scrollTop < limit.bottom) {
                $holder.removeClass('bottom').addClass('fixed');

            } else {
                $holder.addClass('bottom');
            }
        } else {
            $holder.removeClass('bottom').removeClass('fixed');
        }
    }

    $(window).scroll(update);
}

function initInvestorShowSubMenu() {

    $('.investor_doc_img_h2').click(function() {
        $('.investor_menu').addClass('show');
    });
}

function initInvestorCloseSubMenu() {

    $('.close_submenu').click(function () {
        $('.investor_menu').removeClass('show');
    });
}
function initQualitySlide() {
    $('.page_3 .custom_switcher').click(function (){
        $('.field_hide').toggleClass('hide');
    });
}

$(document).ready(function() {
    // update nav (sidebar and main nav position)
    if ($('.nav_sidebar').length && $('.nav_main').length) {
        initNavWaypoints();
    }

    // init popups
    if( $('.popup').length ){
        initPopups();
    }

    if( $('.form_quality_page').length ){
        initQualitySlide();
    }

    // init submenu on popup
    if( $('.submenu_popup').length ){
        initShowSubmenuPopup();
    }

	// placeholder for inputs
    if( $('.placeholder').length ){
        setTimeout(function(){
            $('.placeholder').each(function(i, e){
                if( $(e).siblings('input').length ){
                    setAutoRemoveFormElement($(e).siblings('input'), '', $(e));
                } else {
                    setAutoRemoveFormElement($(e).siblings('textarea'), '', $(e));
                }
            });
        },100);
    }

    // init scrollTo function
    if( $('[data-scrollto]').length ) {
        $('[data-scrollto]').click(function(e) {
            var target = $(this).attr('data-scrollto');
            if ($('.'+target).length) {
                e.preventDefault();
                scrollTo(target);
            } else {
                if ($(this).attr('href').length) {
                    e.preventDefault();
                    window.location.href = $(this).attr('href') + '#' + $(this).attr('data-scrollto');
                }
            }
        });
        if (window.location.hash.length) {
            $(window).load(function() {
                setTimeout(function() {
                    scrollTo(window.location.hash.substring(1));
                }, 1000);
            });
        }
    }

    // add btns text to themselves for nice hovers
    if ($('.btn').length) {
        initBtnsHover();
    }

    // custom select
    if ($('.custom_select').length) {
        $('.custom_select').selecter({
            cover: true // safari style
        });
    }

    // custom select with icons
    if ($('.custom_select_icons').length) {
        $('.custom_select_icons').ddslick({
            onSelected: function(data){
                var category = data.selectedData.value;
                var $listItems = $('.brand_list li');

                // update visibility of rows, according to selected value
                $listItems.each(function(i, el) {
                    var $item = $(el);
                    if ( $item.data('category').split(',').indexOf("" + category) > -1 ) {
                        $item.removeClass('none');
                    } else {
                        $item.addClass('none');
                    }
                });

                // update height of tab
                data.selectedItem.closest('.js_tabs').find('.js_tabs_head .tab.act').click();
            }
        });
    }

    // init custom checkboxes
    if ($('label.custom_checkbox').length) {
        $('label.custom_checkbox').each(function(i, label) {
            $(label).find('input').prop('checked') && $(label).addClass('checked');
            $(label).click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).hasClass('checked')) {
                    $(this).removeClass('checked').find('input').prop('checked', '');
                } else {
                    $(this).addClass('checked').find('input').prop('checked', 'checked');
                }
            });
        });
    }

    // init custom switchers
    if ($('label.custom_switcher').length) {
        $('label.custom_switcher').each(function(i, label) {
            $(label).find('input').prop('checked') && $(label).addClass('checked');
            $(label).click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).hasClass('checked')) {
                    $(this).removeClass('checked').find('input').prop('checked', '');
                } else {
                    $(this).addClass('checked').find('input').prop('checked', 'checked');
                }
            });
        });
    }

    // init stars selectors
    if ($('.field_stars').length) {
        $('.field_stars').each(function(i, field) {
            var $stars = $(field).find('.star');
            $stars.click(function () {
                var index = $stars.index(this);

                $stars.removeClass('act').eq(index).addClass('act');
                $(field).find('input').val(5 - index);
                $(field).find('h4 span').text(5 - index);
                $(field).find('.show_quantity').show();

                var isShowTextarea = false;
                $(field).closest('.stars_group').find('input').each(function(i, el) {
                    if ($(el).val().length && $(el).val() < 4) {
                        isShowTextarea = true;
                    }
                });

                if (isShowTextarea){
                    $(field).closest('.form_quality_page_inner').find('.field_text').addClass('show');
                } else {
                    $(field).closest('.form_quality_page_inner').find('.field_text').removeClass('show');
                }

            });
        });
    }

    // init calculators draggable helpers
    if ($('.input_helper_draggable').length) {
        initCalculatorsHelpers();
    }

    // init simple sliders
    if ($('.banking_slider_block').length) {
        initBankingSliders();
    }

    // init footer sitemap
    if ($('.sitemap').length) {
        initSitemap();
    }

    // init toggle block
    if ($('.toggle_block').length) {
        initToggleBlock();
    }

    /* * * * * * * * * * * * * * *
     * page main
     * * * * * * * * * * * * * * */
    // init main promo sliders
    if ($('.main_promo').length) {
        initMainPromoSliders();
    }

    // init news tabs
    if ($('.main_news').length) {
        initMainNewsTabs();
    }

    // init calculator capability
    if ($('.main_calculator').length) {
        initCalculator();
    }

    // init main achievements slider
    if ($('.main_achievements').length) {
        initMainAchievementsSlider();
    }

     /* * * * * * * * * * * * * * * *
     * page FAQ
     * * * * * * * * * * * * * * * */
    // init faq accordion
    if ($('.faq_block').length) {
        initToggleFaq();
    }

    /* * * * * * * * * * * * * * * *
     * page investors documents
     * * * * * * * * * * * * * * * */
    // init investor_doc accordion
    if ($('.investor_doc_block').length) {
        initToggleNews();
    }

    /* * * * * * * * * * * * * * * *
     * page investor
     * * * * * * * * * * * * * * * */
    // init reports show_more toggle
    if ($('.investor_reports').length) {
        initInvestorReportsToggle();
    }

    // init sub menu show
    if ($('.investor_doc_text_block').length) {
        initInvestorShowSubMenu();
    }

    // init sub menu hide
    if ($('.investor_menu').length) {
        initInvestorCloseSubMenu();
    }

    // init slider of pdf files in brief block
    if ($('.investor_brief').length) {
        initInvestorBriefSlider();
    }

    // init news slider
    if ($('.investor_news').length) {
        initInvestorNewsSlider();
    }

    // init main achievements slider
    if ($('.investor_calendar').length) {
        initInvestorCalendarSlider();
    }

    if ($('.page_news_all_add').length) {
        initAddAllNews();
    }
    if ($('.news_all_filter').length) {
        initFilterAllNews();
    }
    // fold/unfold contacts map
    if ($('.investor_contacts_tabs').length) {
        $('.investor_contacts_tabs .contacts_map_holder')
            .bind('mouseenter', function() {
                $('.investor_contacts_tabs').addClass('active');
            })
            .bind('mouseleave', function() {
                $('.investor_contacts_tabs').removeClass('active');
            });
    }
    if ($('.circle_pie').length) {
        initCirclePies();
    }

    /* * * * * * * * * * * * * * * *
     * page map
     * * * * * * * * * * * * * * * */
    // init draggable time on map page
    if ($('.page_map').length) {
        initMapDraggableTime();
    }

    /* * * * * * * * * * * * * * * *
     * page credit card
     * * * * * * * * * * * * * * * */
    // init card draggable slider
    if ($('.credit_card_slider').length) {
        initCardDragSlider();
    }

    /* * * * * * * * * * * * * * * *
     * page deposit
     * * * * * * * * * * * * * * * */
    // init deposit intro block
    if ($('.deposit_page_intro').length) {
        initDepositIntro();
    }
    // init deposit draggable slider
    if ($('.deposit_page_benefits').length) {
        initDepositDragSlider();
    }

    // init deposit sliders inside tabs
    if ($('.deposit_page_slider_tabs').length) {
        initDepositTabsSliders();
    }

    /* * * * * * * * * * * * * * * *
     * page business
     * * * * * * * * * * * * * * * */
    // init slider inside intro block
    if ($('.business_page_intro').length) {
        initBusinessIntroSlider();
    }
    // init business news slider
    if ($('.business_news').length) {
        initBusinessNewsSlider();
    }

    /* * * * * * * * * * * * * * * *
     * page news
     * * * * * * * * * * * * * * * */
    // init floating arrows on news page
    if ($('.news_arrows').length) {
       initNewsArrowsFloat();
    }
    if ($('.news_social').length) {
        initNewsSocialFloat();
    }
    if ($('.investor_brief').length){
        initScrollPresentation();
    }

    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
        $('html').addClass('is-mobile');
        if ($('html').hasClass('is-mobile')) {
            $('.has_hover_mobile').on('mouseenter', function () {
                $(this).trigger('hover');
            });
            $('.has_hover_mobile').on('mouseleave', function () {
                $(this).removeClass('hover');
            });
        }
    }
    // init tabs switcher
    if ($('.js_tabs').length) {
        setTimeout(function(){
            initTabs();
        }, 10);
    }

 });