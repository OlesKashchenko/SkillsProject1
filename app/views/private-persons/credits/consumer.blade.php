@extends('layouts.default')

@section('wrapper_class')
    page_credit
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="credit_page_intro">
        <div class="bg_holder"><img src="{{asset($page->getImageSource('original', 'preview'))}}" alt="{{$page->t('title')}}"/></div>
        <h3>{{$page->t('title')}}</h3>
        <div class="sub_title">{{$page->t('short_description')}}</div>

        <div class="credit_page_intro_footer">
            <div class="credit_page_intro_footer_blur_holder">
                <div class="credit_page_intro_footer_blur">
                    <img src="{{asset($page->getImageSource('original', 'preview'))}}" alt="{{$page->t('title')}}"/>
                </div>
            </div>
            {{$page->t('options')}}
        </div>
    </div>

    <div class="credit_page_call_to_action">
        {{--<a class="btn btn_red" href="" data-scrollto="credit_page_calculator"><span>{{__('Оформить заявку')}}--}}{{--{{__('посчитать и оформить')}}--}}{{--</span></a>--}}
    </div>

    @include('partials.info_blocks')

   {{-- <div class="credit_page_calculator">
        <h2>{{__('Посчитать и оформить')}}</h2>

        @include('partials.calculators.consumer')
    </div>--}}
@stop

@section('custom_scripts')
    <script src="{{asset('js/calculator.js')}}"></script>

    <script>
        Calculator.settings = {{json_encode(Collector::get('calculatorsSettings'))}};
    </script>
@stop

@section('custom_fields')
    <input type="hidden" name="id_city" value="">
    <input type="hidden" name="id_shop" value="">
    <input type="hidden" name="id_product_type" value="">
    <input type="hidden" name="product_price" value="">
    <input type="hidden" name="credit_term" value="">
    <input type="hidden" name="is_insurance_loss_job" value="">
    <input type="hidden" name="is_insurance_accident" value="">
@stop
