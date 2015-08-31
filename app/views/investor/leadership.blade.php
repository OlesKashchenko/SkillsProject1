@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('wrapper_class')
    page_investor_lead_text
@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="investor_doc_text_block">
        @include('investor.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>

        @if (isset($leaders) && $leaders->count())
            <div class="investor_lead_block">
                @foreach($leaders as $leader)
                        <div class="investor_lead_block_face">
                            <a data-popup="popup_about_leadership" data-id="{{$leader->id}}">
                                <img src="{{asset($leader->getImageSource('original', 'preview'))}}" alt="{{$leader->t('title')}}" title="{{$leader->t('title')}}">
                            </a>
                            <h4>{{$leader->t('title')}}</h4>
                            <small>{{$leader->t('short_description')}}</small>
                        </div>
                    @include('partials.popups.leader_info', ['leader' => $leader])
                @endforeach
            </div>
        @endif

        <div class="hr"></div>
    </div>

    @include('investor.partials.next_page', ['nextPageClass' => 'investor_doc_next_page'])
@stop

@if (isset($leaders) && $leaders->count())
    @section('custom_popups')
        @foreach($leaders as $leader)
            @include('partials.popups.leader_info', ['leader' => $leader])
        @endforeach
    @stop
@endif