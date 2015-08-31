@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="max_width">
        <div class="corporate_text_block">
            <h2>{{$page->t('title')}}</h2>

            {{$page->t('text')}}
        </div>
    </div>
    <div class="hr"></div>
@stop