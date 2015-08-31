@extends('layouts.default')

@section('wrapper_class')
    page_deposit
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => false] )

    <div class="deposit_page_intro">
        <div class="dtable">
            <div class="dtcell">
                <div class="half_left">
                    <h2>{{__('Хочу приумножить')}}</h2>

                    <form class="form" action="" method="post" id="calculator_deposit">
                        <div class="field field_currency">
                            <label>{{__('Сумма вклада')}}</label>
                            <div class="input_holder">
                                <input type="text"
                                       name="deposit_amount"
                                       value="{{{trim(Input::get('deposit_amount')) ? : Collector::get('calculatorsSettings')['deposit']['deposit_amount_default']}}}">
                                <div class="input_helper_draggable"
                                     data-min="{{Collector::get('calculatorsSettings')['deposit']['deposit_amount_min_uah']}}"
                                     data-max="{{Collector::get('calculatorsSettings')['deposit']['deposit_amount_max_uah']}}">
                                </div>
                            </div>
                            <div class="select_holder">
                                <select class="custom_select" name="currency">
                                    <option value="uah" {{trim(Input::get('currency')) == 'uah' ? 'selected' : '';}}>UAH</option>
                                    <option value="usd" {{trim(Input::get('currency')) == 'usd' ? 'selected' : '';}}>USD</option>
                                    <option value="eur" {{trim(Input::get('currency')) == 'eur' ? 'selected' : '';}}>EUR</option>
                                </select>
                            </div>
                        </div>
                        <div class="field field_duration">
                            <label>{{__('На срок')}} <span>{{__('мес.')}}</span></label>
                            <div class="input_holder">
                                <input type="text"
                                       name="term"
                                       value="{{{trim(Input::get('term')) ? : Collector::get('calculatorsSettings')['deposit']['term_default']}}}">
                                <div class="input_helper_draggable"
                                     data-min="{{Collector::get('calculatorsSettings')['deposit']['term_min']}}"
                                     data-max="{{Collector::get('calculatorsSettings')['deposit']['term_max']}}">
                                </div>
                            </div>
                        </div>
                        <div class="field field_batch">
                            <label>{{__('Ежемесячное пополнение')}} <span></span></label>
                            <div class="input_holder">
                                <input type="text"
                                       name="monthly_installment"
                                       value="{{{trim(Input::get('monthly_installment')) ? : Collector::get('calculatorsSettings')['deposit']['monthly_installment_default']}}}">
                                <div class="input_helper_draggable"
                                     data-min="{{Collector::get('calculatorsSettings')['deposit']['monthly_installment_min_uah']}}"
                                     data-max="{{Collector::get('calculatorsSettings')['deposit']['monthly_installment_max_uah']}}">
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>

                        @include('private-persons.deposits.partials.redemptions')
                        @include('partials.calculators.partials.deposit_table')
                    </form>
                </div>
            </div>
        </div>
        <div class="half_right">
            @include('private-persons.deposits.partials.deposits_slider')
        </div>
    </div>

    @include('partials.info_blocks')
@stop

@section('custom_scripts')
    <script src="{{asset('js/deposit.js')}}"></script>
    <script src="{{asset('js/calculator.js')}}"></script>

    <script>
        Calculator.settings = {{{json_encode(Collector::get('calculatorsSettings'))}}};
    </script>
@stop
