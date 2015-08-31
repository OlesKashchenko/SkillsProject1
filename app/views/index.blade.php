@extends('layouts.default')

@section('wrapper_class')
    page_index
@stop

@section('seo_title')@stop
@section('seo_description')@stop
@section('seo_keywords')@stop

@section('main')
    @include('partials.main_promo')
    @include('partials.main_news')

    <div class="main_finances">
        <div class="max_width">
            <div class="main_calculator_tabs js_tabs" data-autoheight="1">
                <h2>{{__('Калькулятор')}}</h2>

                <div class="main_calculator_tabs_head js_tabs_head">
                    <div class="tab act">{{__('Хочу приумножить')}}</div>
                    <div class="tab">{{__('Нужны деньги')}}</div>
                    <div class="tab">{{__('Деньги всегда под рукой')}}</div>

                    {{--<div class="tab">Банк на каждый день</div>--}}

                </div>

                <div class="main_calculator_tabs_body js_tabs_body">
                    @include('partials.calculators.want_multiply')
                    @include('partials.calculators.want_money')
                    @include('partials.calculators.cards')

                    {{--
                    <div class="tab">
                        <div class="tab_inner">

                        </div>
                    </div>
                    --}}

                </div>
            </div>

            @include('partials.main_rates')
        </div>
    </div>

    @include('partials.main_achievements')
@stop

@section('custom_scripts')
    <script src="{{asset('js/calculator.js')}}"></script>
    <script src="{{asset('js/deposit.js')}}"></script>
    <script>
        Calculator.settings = {{json_encode(Collector::get('calculatorsSettings'))}};
        Calculator.deposit_page_url = '{{geturl('private-persons/deposits')}}';
    </script>
@stop
