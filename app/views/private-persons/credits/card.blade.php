@extends('layouts.default')

@section('wrapper_class')
    page_card
@stop

@section('seo_title'){{$card->t('seo_title')}}@stop
@section('seo_description'){{$card->t('seo_description')}}@stop
@section('seo_keywords'){{$card->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="credit_card_intro">
        <div class="bg_holder"><img src="{{asset($card->getImageSource('original', 'image_background_single'))}}" alt="{{$card->t('title')}}"/></div>
        <h3>{{$card->t('title')}}</h3>
        @if ($card->t('short_description'))
            <div class="sub_title">{{$card->t('short_description')}}</div>
        @endif

        <div class="credit_card_intro_footer">
            <div class="credit_card_intro_footer_blur_holder">
                <div class="credit_card_intro_footer_blur">
                    <img src="{{asset($card->getImageSource('original', 'image_background_single'))}}" alt="{{$card->t('title')}}"/>
                </div>
            </div>

            {{$card->t('options')}}
        </div>
    </div>

    <div class="credit_card_call_to_action">
        <a class="btn btn_red" href="{{$card->getCustomLink()}}" target="_blank" {{--data-popup="popup_apply_form"--}}><span>{{__('заказать бесплатно')}}</span></a>
    </div>

    @include('partials.info_blocks')

    <div class="credit_card_its_time">
        <h2>{{__('Самое время жить на полную с картой')}} {{$card->t('title')}}</h2>
        <a class="btn btn_red" style="margin-top: 20px;" href="{{$card->getCustomLink()}}" target="_blank" {{--data-popup="popup_apply_form"--}}><span>{{__('заказать бесплатно')}}</span></a>
    </div>
@stop
