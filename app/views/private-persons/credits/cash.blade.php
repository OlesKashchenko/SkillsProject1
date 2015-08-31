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
        <a class="btn btn_red" href="" data-scrollto="credit_page_calculator"><span>{{__('посчитать и оформить');}}</span></a>
    </div>

    @include('partials.info_blocks')

    <div class="credit_page_calculator">
        <h2>{{__('Посчитать и оформить');}}</h2>

        <form class="form form_calculator_2" action="" method="post" id="calculator_cash">
            <div class="field field_income">
                <label>{{__('Ежемесячный доход')}} <span>{{__('UAH')}}</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="monthly_income"
                           value="{{Collector::get('calculatorsSettings')['cash']['monthly_income_default']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['cash']['monthly_income_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['cash']['monthly_income_max']}}">
                    </div>
                </div>
            </div>
            <div class="field field_price">
                <label>{{__('Сумма кредита')}} <span>{{__('UAH')}}</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="credit_amount"
                           value="{{Collector::get('calculatorsSettings')['cash']['credit_amount_default']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['cash']['credit_amount_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['cash']['credit_amount_max']}}">
                    </div>
                </div>
            </div>
            <div class="field field_duration">
                <label>{{__('На срок')}} <span>{{__('мес.')}}</span></label>
                <div class="input_holder">
                    <input type="text"
                           name="term"
                           value="{{Collector::get('calculatorsSettings')['cash']['term_default']}}">
                    <div class="input_helper_draggable"
                         data-min="{{Collector::get('calculatorsSettings')['cash']['term_min']}}"
                         data-max="{{Collector::get('calculatorsSettings')['cash']['term_max']}}">
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            @include('partials.calculators.partials.cash_table')

            <div class="field field_assurance">
                <label class="label_name">{{__('Застраховать кредит')}}</label>
                <label class="custom_checkbox"><input type="checkbox" name="is_insurance_loss_job"> {{__('от временной потери работы')}}</label>
                <label class="custom_checkbox"><input type="checkbox" name="is_insurance_accident"> {{__('от несчастного случая')}}</label>
            </div>

            <div class="tac">
                <div class="submit btn btn_big btn_red">
                    <input type="submit" class="input_btn" value="{{__('оформить заявку')}}" onclick="return false;" data-popup="popup_apply_form">
                </div>
            </div>
        </form>
    </div>
@stop

@section('custom_scripts')
    <script src="{{asset('js/calculator.js')}}"></script>

    <script>
        Calculator.settings = {{json_encode(Collector::get('calculatorsSettings'))}};
    </script>
@stop

@section('custom_fields')
    <input type="hidden" name="monthly_income" value="">
    <input type="hidden" name="credit_amount" value="">
    <input type="hidden" name="term" value="">
    <input type="hidden" name="is_insurance_loss_job" value="">
    <input type="hidden" name="is_insurance_accident" value="">
@stop
