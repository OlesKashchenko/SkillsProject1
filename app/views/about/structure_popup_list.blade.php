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
        @include('about.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>
        <div class="investor_doc_block">
        @if (isset($articles) && $articles->count())
            @foreach($articles as $article)
                @if (!$article->isActive())
                    @continue
                @endif
                <div class="investor_doc_question">
                    <div class="investor_doc_title">{{$article->t('title')}}</div>
                    <div class="investor_doc_text">
                    @if($article->children->count() )
                        <div class="investor_doc_text_inner">
                       <ul>
                                @foreach($article->children as $file)
                                    @if (File::exists($file->file) && $file->isActive())
                                        <li>
                                            <a href="{{asset($file->file)}}">{{$file->t('title')}}
                                                <span>{{Util::formatSizeUnits(File::size($file->file))}}</span>
                                                <span>{{File::extension($file->file)}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                        </div>
                    @else
                        <div class="investor_doc_text_inner">
                            <div class="investor_risk_text_inner">{{$article->t('description')}}</div>
                        </div>
                    @endif
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <div class="hr"></div>
    </div>

    @include('about.partials.next_page', ['nextPageClass' => 'investor_doc_next_page'])
@stop
