@extends('layouts.default')

@section('wrapper_class')
    page_business_catalog
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @if ($page->id == Collector::get('idSmallBusinessDeposits'))
        @include('partials.breadcrumbs', ['type' => false])
    @else
        @include('partials.breadcrumbs', ['type' => true])
    @endif

    <div class="business_catalog_intro">
        <div class="bg_holder"><img src="{{asset($page->getImageSource('original', 'image_background'))}}" alt="{{$page->t('title')}}"/></div>
        <h3>{{$page->t('title')}}</h3>
        <div class="sub_title">{{$page->t('label')}}</div>
    </div>

    @if (isset($products) && $products->count())
    <div class="business_catalog_list">
        <ul>
            @foreach($products as $product)
                <li>
                    <div class="business_info">
                        <div class="business_name">
                            <div class="dtable">
                                <div class="dtcell">
                                    <p>{{$product->t('title')}}</p>
                                </div>
                            </div>
                        </div>

                        <?php

                        $benefits = explode(';', $product->t('benefits'));
                            // fixme:
                        $benefitsDescriptions = explode(';', strip_tags($product->t('benefits_description'), '<br>,<br/>'));
                        ?>

                        @if ($benefits)
                            @foreach($benefits as $benefit)
                                <div class="business_text type_{{$loop->index1}}">
                                    <p>{{$benefit}}</p>
                                    @if (isset($benefitsDescriptions[$loop->index]))
                                        <span>{{$benefitsDescriptions[$loop->index]}}</span>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        <div class="business_description">
                            <div class="dtable">
                                <div class="dtcell">
                                    <p>{{$product->t('short_description')}}</p>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn_red" href="{{geturl($product->getUrl())}}"><span>{{__('заказать')}}</span></a>
                    </div>
                    <img class="business_bg" src="{{asset($product->getImageSource('original', 'image_background'))}}" alt="{{$product->t('title')}}"/>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
@stop

@section('custom_popups')
    @include('partials.popups.apply_form_business')
@stop