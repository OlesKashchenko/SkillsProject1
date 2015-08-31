@extends('layouts.default')

@section('wrapper_class')
    page_business_catalog
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => false])

    @if (isset($products) && $products->count())
        <div class="business_catalog_block">
            @foreach($products as $product)
                <div class="business_catalog_block_item">
                    <div class="business_catalog_block_item_info">
                        <h3>{{$product->t('title')}}</h3>
                        <div class="business_catalog_info">
                            <div class="max_width">
                                <div class="columns_holder">
                                    {{$product->t('short_description')}}
                                </div>
                            </div>
                            <a class="btn btn_yellow" href="{{geturl($product->getUrl())}}"><span>{{__('подробнее')}}</span></a>
                        </div>
                    </div>

                    <img src="{{asset($product->getImageSource('original', 'image_background'))}}" alt="{{$product->t('title')}}"/>
                </div>
            @endforeach
        </div>
    @endif
@stop