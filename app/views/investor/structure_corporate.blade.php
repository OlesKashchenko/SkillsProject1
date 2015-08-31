@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('wrapper_class')
    page_investor_struct_text
@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="investor_doc_text_block">
        @include('investor.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>
            {{$page->t('text')}}
        {{--temporarily made for task  to controll links in admin panel--}}
       {{-- <div class="investor_struct_first_div">
            <a class="investor_struct_a_text" href="{{geturl('/')}}">{{__('Общее собрание акционеров')}}</a>
            <i class="investor_struct_arrows_right" style="opacity: 0.2"></i>
            <a class="investor_struct_a_text" href="{{geturl('/')}}">{{__('Ревизионная комиссия')}}</a>
        </div>
        <i class="investor_struct_arrows_bottom" style="opacity: 0.2"></i>
        <div class="investor_struct_second_div">
            <a class="investor_struct_a_text" href="{{geturl('/')}}">{{__('Внутренний аудит')}}</a>
            <i class="investor_struct_arrows_left" style="opacity: 0.2"></i>
            <a class="investor_struct_a_text" href="{{geturl('/')}}">{{__('Наблюдательный совет')}}</a>
        </div>
        <i class="investor_struct_arrows_bottom" style="opacity: 0.2"></i>
        <div class="investor_struct_third_div">
            <a class="investor_struct_a_text" href="{{geturl('/')}}">{{__('Правление')}}</a>
        </div>
        <div class="investor_struct_arrows_struct">
            <i class="investor_struct_arrows_first"></i>
            <i class="investor_struct_arrows_second"></i>
            <i class="investor_struct_arrows_third"></i>
            <i class="investor_struct_arrows_fourth"></i>
        </div>
        <div class="investor_struct_ul">
            <ul>
                <a href="{{geturl('/')}}">{{__('Кредитные комитеты')}}</a>
                <a href="{{geturl('/')}}">{{__('Комитет по управлению активами и пассивами')}}</a>
                <a href="{{geturl('/')}}">{{__('Бюджетный комитет')}}</a>
                <a href="{{geturl('/')}}">{{__('Тендерный комитет')}}</a>
            </ul>
            <ul>
                <a href="{{geturl('/')}}">{{__('Тарифный комитет')}}</a>
                <a href="{{geturl('/')}}">{{__('Комитет по Операционным рискам')}}</a>
                <a href="{{geturl('/')}}">{{__('Управляющий комитет ИТ')}}</a>
                <a href="{{geturl('/')}}">{{__('Управляющий комитет РБ')}}</a>
            </ul>
        </div>
        <div class="hr"></div>--}}
    </div>

    @include('investor.partials.next_page', ['nextPageClass' => 'investor_struct_next_page'])
@stop