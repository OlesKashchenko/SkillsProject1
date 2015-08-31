@extends('layouts.default')

@section('wrapper_class')
    page_news_text
@stop

@section('seo_title')@stop
@section('seo_description')@stop
@section('seo_keywords')@stop

@section('main')
    @include('partials.breadcrumbs', ['custom' => ['url' => $pressItem->catalog->getUrl(), 'title' => $pressItem->catalog->t('title')]])

    <div class="news_arrows">
        @if (isset($previousPressItem) && $previousPressItem)
            <div class="news_arrow left"><a href="{{$previousPressItem->getUrl()}}">{{$previousPressItem->t('title')}}</a></div>
        @endif

        @if (isset($nextPressItem) && $nextPressItem)
            <div class="news_arrow right"><a href="{{$nextPressItem->getUrl()}}">{{$nextPressItem->t('title')}}</a></div>
        @endif
    </div>
    <div class="news_text_block">
        <h2>{{$pressItem->t('title')}}</h2>

        <div class="news_text_block_span">
            <span>{{$pressItem->catalog->t('title')}}</span>
            <span>{{$pressItem->getDate()}}</span>
        </div>

        @if ($pressItem->image)
            <div class="news_slide">
                <img src="{{asset($pressItem->getImageSource('original', 'image'))}}" alt="{{$pressItem->t('title')}}"/>
            </div>
        @endif

        @include('about.press.partials.socials', ['item' => $pressItem])

        {{$pressItem->t('text')}}

        <div class="hr"></div>
    </div>
@stop