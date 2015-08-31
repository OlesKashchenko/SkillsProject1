@extends('layouts.default')

@section('wrapper_class')
    page_business
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => false])

    @if (isset($sliderItems) && $sliderItems->count())
        <div class="business_page_intro">
            <div class="bg_holder">
                <ul class="bxslider">
                    @foreach($sliderItems as $sliderItem)
                        <li>
                            <a href="{{geturl($sliderItem->link)}}">
                                <img src="{{asset($sliderItem->getImageSource('original', 'image'))}}" alt="{{$sliderItem->t('title')}}"/>
                                <h3 class="size_big">{{$sliderItem->t('title')}}</h3>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (isset($products) && $products->count())
    <div class="business_page_offers">
        @foreach($products as $product)
            <a href="{{geturl($product->getUrl())}}" class="business_page_offers_item">
                <div class="business_page_offers_item_inner">
                    <div class="img_holder"><img src="{{asset($product->getImageSource('original', 'preview'))}}" alt="{{$product->t('title')}}"/></div>
                    <div class="offer_info">
                        <div class="dtable">
                            <div class="dtcell">
                                <div class="offer_name">{{$product->t('title')}}</div>
                                <div class="offer_text">{{$product->t('short_description')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @endif

    @if (isset($partnership) && $partnership)
        <div class="business_page_partnership">
            <div class="max_width">
                <h2>{{$partnership->t('title')}}</h2>

                <div class="fleft">
                    <p>{{$partnership->t('description')}}</p>
                </div>

                <div class="fright">
                    {{$partnership->t('short_description')}}
                </div>
                <div class="clear"></div>

                <div class="tac">
                    <a class="btn btn_red" data-popup="popup_partner_form" href=""><span>{{__('Стать партнером')}}</span></a>
                </div>
            </div>
        </div>
    @endif

    @if (isset($news) && $news->count())
        <div class="business_news">
            <div class="max_width">
                <h2>{{__('Новости')}}</h2>
                <div class="sider_holder">
                    <div class="bxslider">
                        <ul>
                            <li>
                                @foreach($news as $newItem)
                                    <a href="{{$newItem->getUrl()}}">
                                        @if ($newItem->preview)
                                            <i class="img-holder">
                                                <img src="{{asset($newItem->getImageSource('original', 'preview'))}}" alt="{{$newItem->t('title')}}"/>
                                            </i>
                                        @endif
                                        <p>{{$newItem->t('title')}}</p>
                                        <span>{{$newItem->getDate()}}</span>
                                    </a>

                                    @if ($loop->index1 % 3 == 0)
                                        </li>
                                        <li>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@section('custom_popups')
    @include('partials.popups.new_partner')
@stop
