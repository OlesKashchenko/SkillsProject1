@extends('layouts.default')

@section('wrapper_class')
    page_business_custom
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="max_width">
        <div class="corporate_text_block">
            <h2>{{$page->t('title')}}</h2>

            <div class="corporate_text_with_hint">
                {{--
                <p class="sub_title">{{$page->t('description')}}</p>
                --}}

                <div class="corporate_text_hint">
                    @if ($page->image_right_column && asset($page->getImageSource('original', 'image_right_column')))
                        <img class="user_avatar" src="{{asset($page->getImageSource('original', 'image_right_column'))}}" alt="">
                    @endif

                    {{$page->t('description')}}
                </div>
            </div>

            {{$page->t('text')}}
        </div>
    </div>
    <div class="hr"></div>
@stop