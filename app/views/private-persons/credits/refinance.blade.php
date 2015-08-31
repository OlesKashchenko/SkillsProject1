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

        <div class="credit_page_intro_footer type_2">
            <div class="credit_page_intro_footer_blur_holder">
                <div class="credit_page_intro_footer_blur">
                    <img src="{{asset($page->getImageSource('original', 'preview'))}}" alt="{{$page->t('title')}}"/>
                </div>
            </div>
            <div class="info_holder">
                {{$page->t('options')}}
            </div>
        </div>
    </div>

    <div class="credit_page_call_to_action">
       {{-- <a class="btn btn_red" href="" data-scrollto="credit_page_calculator"><span>{{__('посчитать и оформить')}}</span></a>--}}
    </div>

    @include('partials.info_blocks')

    {{--<div class="credit_page_calculator">
        <h2>{{__('Посчитать и оформить')}}</h2>

        <form class="form form_calculator_3" action="" method="post" id="calculator_refinance">
            <div class="field field_credit_type">
                <div class="input_holder">
                    <label class="custom_switcher">
                        <span>{{__('Кредит')}}</span>
                        <span class="switcher"></span>
                        <span>{{__('Кредит на карте')}}</span>
                        <input type="checkbox" value="card" name="is_card">
                    </label>
                </div>
            </div>

            <div class="field field_payment">
                <label>{{__('Ежемесячная плата')}} <span>UAH</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="monthly_payment"
                           value="{{Collector::get('calculatorsSettings')['refinance']['monthly_payment_min']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['refinance']['monthly_payment_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['refinance']['monthly_payment_max']}}">
                    </div>
                </div>
            </div>
            <div class="field field_duration">
                <label>{{__('Осталось погашать')}} <span>{{__('мес.')}}</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="months_left"
                           value="{{Collector::get('calculatorsSettings')['refinance']['left_repay_months_min']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['refinance']['left_repay_months_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['refinance']['left_repay_months_max']}}">
                    </div>
                </div>
            </div>
            <div class="field field_cost_left">
                <label>{{__('Осталось погашать')}} <span>UAH</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="cost_left"
                           value="{{Collector::get('calculatorsSettings')['refinance']['left_repay_money_min']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['refinance']['left_repay_money_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['refinance']['left_repay_money_max']}}">
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            @include('partials.calculators.partials.refinance_table')

            <div class="field field_assurance">
                <label class="label_name">{{__('Застраховать кредит')}}</label>
                <label class="custom_checkbox"><input type="checkbox" name="is_insurance_loss_job"> {{__('от временной потери работы')}}</label>
                <label class="custom_checkbox"><input type="checkbox" name="is_insurance_accident"> {{__('от несчастного случая')}}</label>
            </div>

            <div class="tac">
                <div class="submit btn btn_big btn_red">
                    <input type="submit" class="input_btn" value="{{__('оформить заявку')}}" data-popup="popup_apply_form" onclick="return false;">
                </div>
            </div>
        </form>
    </div>--}}
@stop

@section('custom_scripts')
    <script src="{{asset('js/calculator.js')}}"></script>

    <script>
        Calculator.settings = {{json_encode(Collector::get('calculatorsSettings'))}};
    </script>
@stop

@section('custom_fields')
    <input type="hidden" name="monthly_fee" value="">
    <input type="hidden" name="left_to_repay_months" value="">
    <input type="hidden" name="left_to_repay_money" value="">
    <input type="hidden" name="credit_type" value="">
    <input type="hidden" name="is_insurance_loss_job" value="">
    <input type="hidden" name="is_insurance_accident" value="">
@stop
