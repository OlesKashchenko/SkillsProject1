@extends('layouts.default')

@section('wrapper_class')
    page_credit_catalog
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="credit_card_catalog_intro">
        <div class="bg_holder"><img src="{{asset($page->getImageSource('original', 'preview'))}}" alt=""/></div>
        <h3>{{$page->t('title')}}</h3>
        @if ($page->t('short_description'))
            <div class="sub_title">{{$page->t('short_description')}}</div>
        @endif
    </div>

    <div class="credit_card_catalog_list">
        @if (isset($cards) && $cards->count())
        <ul>
            @foreach($cards as $card)
                <?php
                $categories = array();
                foreach ($card->cardsCategories as $cardCategory) {
                    $categories[] = $cardCategory->id;
                }
                ?>

                <li data-id-category='{{json_encode($categories)}}' data-id-card="{{$card->id}}">
                    <div class="card_info">
                        <div class="card_name">
                            <p>{{$card->t('title')}}</p>
                            <span>{{$card->t('short_description')}}</span>
                        </div>

                        <div class="card_image">
                            <img class="fake" src="{{asset($card->getImageSource('original', 'image_card_fake'))}}" alt="{{$card->t('title')}}"/>
                            <img class="front" src="{{asset($card->getImageSource('original', 'image_card_front'))}}" alt="{{$card->t('title')}}"/>
                        </div>

                        <?php
                        $benefits = explode(';', $card->t('benefits'));
                        $benefitsDescriptions = explode(';', $card->t('benefits_description'));
                        ?>

                        @foreach($benefits as $benefit)
                            <div class="card_text type_{{$loop->index1}}">
                                <p>{{strip_tags($benefit)}}</p>
                                @if (isset($benefitsDescriptions[$loop->index]))
                                    <span>{{strip_tags($benefitsDescriptions[$loop->index])}}</span>
                                @endif
                            </div>
                        @endforeach

                        {{--<div class="card_add {{!in_array($card->id, Tree::getCardsCompared()) ? 'act' : ''}}" onclick="Card.addToCompare('{{$card->id}}', this)">{{__('Добавить к сравнению')}}</div>
                        <div class="card_remove {{in_array($card->id, Tree::getCardsCompared()) ? 'act' : ''}}" onclick="Card.removeFromCompare('{{$card->id}}', this)">{{__('Убрать из сравнения')}}</div>--}}

                        <a class="btn btn_red" href="{{geturl($card->getUrl())}}"><span>{{__('заказать бесплатно')}}</span></a>
                    </div>
                    <img class="card_bg" src="{{asset($card->getImageSource('original', 'image_background'))}}" alt="{{$card->t('title')}}"/>
                </li>
            @endforeach
        </ul>
        @endif
    </div>
{{--temporarily--}}
   {{-- <div id="cards-compare-container">
        @include('partials.cards_compare')
    </div>--}}
@stop

@section('custom_popups')
    @include('partials.popups.cards_compare')
@stop

@section('custom_scripts')
    <script src="{{asset('js/card.js')}}"></script>
@stop