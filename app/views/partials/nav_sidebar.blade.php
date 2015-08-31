<?php

$minimized = '';
$paths = array(
    '/', 'ru', 'en',
    'about', 'ru/about', 'en/about',
    'investor-relations', 'ru/investor-relations', 'en/investor-relations',
    'feedback', 'ru/feedback', 'en/feedback',
    'map', 'ru/map', 'en/map',
    'banking', 'ru/banking', 'en/banking',
);

if (!in_array(Request::path(), $paths)) {
    $minimized = 'minimized';
}

?>

<div class="nav_sidebar_holder">
    <div class="nav_sidebar {{$minimized}}">
        <div class="part_1">
            <span class="sidebar_icon_0"><a href="https://my.alfabank.com.ua/login {{--{{geturl('banking')}}--}}">{{__('Интернет-банк')}}</a></span>
            <span class="sidebar_icon_1"><a href="{{geturl('private-persons/credits/cash')}}">{{__('Заявка на кредит')}}</a></span>
            <span class="sidebar_icon_2"><a href="{{geturl('private-persons/deposits')}}">{{__('Заявка на депозит')}}</a></span>
            <span class="sidebar_icon_3"><a href="https://my.alfabank.com.ua/alfa-pogashenie" target="_blank">{{__('Онлайн погашения')}}</a></span>
            <span class="sidebar_icon_4"><a href="">{{__('Билеты жд/авиа')}}</a></span>
            <span class="sidebar_icon_5"><a href="http://ticket.alfabank.ua/" target="_blank">{{__('Билеты кино/театр')}}</a></span>
            <span class="sidebar_icon_6"><a href="{{geturl('about/quality')}}">{{__('Качество сервиса')}}</a></span>
            <span class="sidebar_icon_7"><a href="{{geturl('feedback')}}">{{__('Обратная связь')}}</a></span>
            <span class="sidebar_icon_8"><a href="{{geturl('map')}}">{{__('Отделения и банкоматы')}}</a></span>
        </div>
        <i class="nav_sidebar_burger"></i>
    </div>
</div>