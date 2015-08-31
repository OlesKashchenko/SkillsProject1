@extends('layouts.default')

@section('wrapper_class')
    page_business
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="business_page_intro">
        <div class="bg_holder">
            <h3 class="name_holder">{{$page->t('title')}}</h3>
            <img src="{{asset($page->getImageSource('original', 'image_background_single'))}}" alt="{{$page->t('title')}}"/>
        </div>
        <div class="sub_title">{{$page->t('label')}}</div>
    </div>

    <div class="business_page_call_to_action">
        <a class="btn btn_red" href="javascript:void(0);" data-popup="popup_packet_form"><span>{{__('заказать')}}</span></a>
    </div>

    @include('partials.info_blocks')
@stop

@section('custom_popups')
    @include('partials.popups.apply_form_business')
@stop
