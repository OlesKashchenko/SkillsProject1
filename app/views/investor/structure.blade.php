@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('wrapper_class')
    page_investor_propery_text
@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="investor_doc_text_block">
        @include('investor.partials.submenu')

        <i class="investor_doc_img_h2"></i>

        <h2>{{$page->t('title')}}</h2>

        @if (isset($items) && $items->count())
            <div class="investor_propery_wrapper">
                <div class="investor_propery_wrapper_first">
                    @foreach($items as $item)
                        @if (in_array($item->slug, array('freedman', 'khan', 'aven', 'kuzmichev')))
                            <div class="investor_propery_wrapper_name">
                                <h4>{{$item->t('title')}}</h4>
                                <small>{{$item->t('label')}}</small>
                                <div class="circle_pie" data-angle="140">
                                    <div class="spinner"></div>
                                    <div class="filler"></div>
                                    <div class="mask"></div>
                                </div>
                                <p>{{$item->t('short_description')}}%</p>
                                <div class="investor_propery_hover_hint">
                                    <span>{{$item->t('description')}}</span>
                                    <p>{{__('Место проживания')}}<br> <span>{{$item->t('text')}}</span></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="investor_propery_wrapper_margin">
                    <div class="investor_propery_wrapper_second">
                        <i class="investor_struct_arrows_bottom"></i>

                        @if (isset($items['sa']) && $items['sa'])
                            <div class="investor_propery_wrapper_name">
                                <h4>{{$items['sa']->t('title')}}</h4>
                                <small>{{$items['sa']->t('label')}}</small>
                                <div class="circle_pie" data-angle="360">
                                    <div class="spinner"></div>
                                    <div class="filler"></div>
                                    <div class="mask"></div>
                                </div>
                                <p>{{$items['sa']->t('short_description')}}%</p>
                                <div class="investor_propery_hover_hint">
                                    <span>{{strip_tags($items['sa']->t('description'))}}</span>
                                    <p>{{__('Местоположение ')}}<br> <span>{{strip_tags($items['sa']->t('text'))}}</span></p>
                                    <span>{{__('Код')}}<br>{{strip_tags($items['sa']->t('benefits'))}}</span>
                                </div>
                            </div>
                            <i class="investor_struct_arrows_bottom"></i>
                        @endif

                        @if (isset($items['limited']) && $items['limited'])
                            <div class="investor_propery_wrapper_name">
                                <h4>{{$items['limited']->t('title')}}</h4>
                                <small>{{$items['limited']->t('label')}} </small>
                                <div class="circle_pie" data-angle="360">
                                    <div class="spinner"></div>
                                    <div class="filler"></div>
                                    <div class="mask"></div>
                                </div>
                                <p>{{$items['limited']->t('short_description')}}%</p>
                                <div class="investor_propery_hover_hint">
                                    <span>{{strip_tags($items['limited']->t('description'))}}</span>
                                    <p>{{__('Местоположение ')}} <br> <span>{{strip_tags($items['limited']->t('text'))}}</span></p>
                                    <span>{{__('Код')}}<br>{{strip_tags($items['limited']->t('benefits'))}}</span>
                                </div>
                            </div>
                            {{--<i class="investor_struct_arrows_bottom"></i>--}}
                        @endif
                        <div class="clear"></div>
                        <div class="investor_struct_arrows_last">
                            @if (isset($items['alfa']) && $items['alfa'])
                            <div class="left_half">
                                <i class="investor_struct_arrows_bottom"></i>
                                <div class="investor_propery_wrapper_name">
                                    <h4>{{$items['alfa']->t('title')}}</h4>
                                    <div class="investor_propery_logo"></div>
                                    <div class="investor_propery_hover_hint">
                                        <span>{{strip_tags($items['alfa']->t('description'))}}</span>
                                        <p>{{__('Местоположение ')}} <br> <span>{{strip_tags($items['alfa']->t('text'))}}</span></p>
                                        <span>{{__('Код')}}<br>{{strip_tags($items['alfa']->t('benefits'))}}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($items['pao-neos-bank']) && $items['pao-neos-bank'])
                            <div class="right_half">
                                <i class="investor_struct_arrows_bottom"></i>
                                <div class="investor_propery_wrapper_name">
                                    <h4>{{$items['pao-neos-bank']->t('title')}}</h4>
                                    <div class="investor_propery_logo"></div>
                                    <div class="investor_propery_hover_hint">
                                        <span>{{strip_tags($items['pao-neos-bank']->t('description'))}}</span>
                                        <p>{{__('Местоположение ')}} <br> <span>{{strip_tags($items['pao-neos-bank']->t('text'))}}</span></p>
                                        <span>{{__('Код')}}<br>{{strip_tags($items['pao-neos-bank']->t('benefits'))}}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        {{--@if (isset($items['alfa']) && $items['sa'])
                            <div class="investor_propery_wrapper_name">
                                <h4>{{$items['alfa']->t('title')}}</h4>
                                <div class="investor_propery_logo"></div>
                                <div class="investor_propery_hover_hint">
                                    <span>{{strip_tags($items['alfa']->t('description'))}}</span>
                                    <p>{{__('Местоположение ')}} <br> <span>{{strip_tags($items['alfa']->t('text'))}}</span></p>
                                    <span>{{__('Код')}}<br>{{strip_tags($items['alfa']->t('benefits'))}}</span>
                                </div>
                            </div>
                        @endif--}}
                    </div>
                </div>
            </div>
        @endif

        <div class="hr"></div>
    </div>

    @include('investor.partials.next_page', ['nextPageClass' => 'investor_doc_next_page'])
@stop