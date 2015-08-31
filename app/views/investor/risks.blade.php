@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('wrapper_class')
    page_investor_risk_text
@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="investor_doc_text_block">
        @include('investor.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>

        <div class="investor_doc_block">
        @if (isset($risks) && $risks->count())
            @foreach($risks as $risk)
                @if (!$risk->isActive())
                    @continue
                @endif
                <div class="investor_doc_question">
                    <div class="investor_doc_title">{{$risk->t('title')}}</div>
                    <div class="investor_doc_text">
                    @if($risk->children->count() )
                        <div class="investor_doc_text_inner">
                       <ul>
                                @foreach($risk->children as $ris)
                                    @if (File::exists($ris->file) && $ris->isActive())
                                        <li>
                                            <a href="{{asset($ris->file)}}">{{$ris->t('title')}}
                                                <span>{{Util::formatSizeUnits(File::size($ris->file))}}</span>
                                                <span>{{File::extension($ris->file)}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                        </div>
                    @else
                        <div class="investor_doc_text_inner">
                            <div class="investor_risk_text_inner">{{$risk->t('description')}}</div>
                        </div>
                    @endif
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <div class="hr"></div>
    </div>

    @include('investor.partials.next_page', ['nextPageClass' => 'investor_doc_next_page'])
@stop