@extends('layouts.default')

@section('wrapper_class')
    page_transfer
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="transfer_page_intro">
        <div class="bg_holder"><img src="{{asset($page->getImageSource('original', 'preview'))}}" alt="{{$page->t('title')}}"/></div>

        @if ($page->getImageSource('original', 'logo') && File::exists($page->getImageSource('original', 'logo')))
            <div class="transfer_page_intro_logo">
                <img src="{{asset($page->getImageSource('original', 'logo'))}}" alt="{{$page->t('title')}}"/>
            </div>
        @endif

        <h3>{{$page->t('title')}}</h3>
        <div class="sub_title">{{$page->t('short_description')}}</div>

        <div class="transfer_page_intro_footer type_2">
            <div class="transfer_page_intro_footer_blur_holder">
                <div class="transfer_page_intro_footer_blur">
                    <img src="{{asset($page->getImageSource('original', 'preview'))}}" alt="{{$page->t('title')}}"/>
                </div>
            </div>
            <div class="info_holder">
                {{$page->t('options')}}
            </div>
        </div>
    </div>

    @include('partials.info_blocks')
@stop