@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="max_width">
        <div class="corporate_text_block">
            <h2>{{$page->t('title')}}</h2>
            <ul>
                @foreach($blocks as $item)
                    @if($item->isActive())
                    <li><a href="javascript:void(0);" data-id="{{$item->id}}" data-popup="popup_text">{{$item->t('title')}}</a></li>
                    @endif
                @endforeach
{{--                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/klientam-.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/klientam-.htm">Клиентам Крыма</a></li>
                <li><a data-cke-saved-href="https://my.alfabank.com.ua/alfa-pogashenie" href="https://my.alfabank.com.ua/alfa-pogashenie">Альфа-Погашение</a> (интернет сервис)</li>
                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/potrebitelskii-kredit-kredit-na-pokupku-tovara_kak-pogashat-kredit.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/potrebitelskii-kredit-kredit-na-pokupku-tovara_kak-pogashat-kredit.htm">Потребительский кредит</a> (кредит на покупку товара)</li>
                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/kredit-nalichymi.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/kredit-nalichymi.htm">Кредит наличными</a></li>
                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/kreditnaja-karta_kak-pogashat-kredit_1400758525.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/kreditnaja-karta_kak-pogashat-kredit_1400758525.htm">Кредитная карта</a></li>
                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/avtokredit_-ipoteka_kak-pogashat-kredit.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/avtokredit_-ipoteka_kak-pogashat-kredit.htm">Автокредит, ипотека</a></li>
                <li><a data-cke-saved-href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/terminaly-samoobsluzhivanija.htm" href="http://www.alfabank.ua/ru/chastnym-licam/kredity/kak-pogashat-kredit/terminaly-samoobsluzhivanija.htm">Терминалы самообслуживания</a></li>--}}
            </ul>
            {{$page->t('text')}}
        </div>
    </div>
    <div class="hr"></div>
@stop

@section('custom_popups')
    @foreach($blocks as $items)
        @if ($items->isActive())
                @include('partials.popups.text_popup', ['id' => $items->id, 'title' => $items->t('title'), 'text' => $items->t('text')])
        @endif
    @endforeach
@stop
