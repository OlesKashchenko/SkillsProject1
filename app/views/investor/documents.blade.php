@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('wrapper_class')
    page_investor_doc_text
@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="investor_doc_text_block">
        @include('investor.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>

        <div class="investor_doc_block">
        @if (isset($documents) && $documents->count())
            @foreach($documents as $document)
            <div class="investor_doc_question">
                <div class="investor_doc_title">{{$document->t('title')}}</div>

                <div class="investor_doc_text">
                    @if($document->children->count())
                    <div class="investor_doc_text_inner">
                        <ul>
                                @foreach($document->children as $doc)
                                    @if (File::exists($doc->file))
                                        <li>
                                            <a href="{{asset($doc->file)}}">{{$doc->t('title')}}
                                                <span>{{Util::formatSizeUnits(File::size($doc->file))}}</span>
                                                <span>{{File::extension($doc->file)}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
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

