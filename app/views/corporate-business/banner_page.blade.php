@extends('layouts.default')

@section('wrapper_class')
    page_corporate
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
        @include('partials.breadcrumbs', ['type' => true])

        <div class="corporate_page_intro">
            <div class="bg_holder"><img src="{{asset($page->getImageSource('original', 'preview'))}}" alt=""/></div>
            <h3>{{$page->t('title')}}</h3>
            <div class="sub_title">{{$page->t('short_description')}}</div>
        </div><!--.credit_page_intro-->
        <div class="corporate_page_holder">
            <div class="max_width">
            {{--<div class="corporate_text_block">--}}
                    {{$page->t('text')}}
                {{--</div>--}}
            </div>
            <div class="hr"></div>
        </div>
@stop
