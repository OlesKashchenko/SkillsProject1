<div class="tab">
    <div class="tab_inner">
        <form class="form" action="" id="calculator_cash" data-is-main="1">
            <div class="field_group">
                <div class="field">
                    <label>{{__('Ежемесячный доход')}}<span>{{__('UAH')}}</span></label>
                    <div class="input_holder">
                        <input type="text"
                               name="monthly_income"
                               value="{{Collector::get('calculatorsSettings')['cash']['monthly_income_default']}}">
                        <div class="input_helper_draggable"
                               data-min="{{Collector::get('calculatorsSettings')['cash']['monthly_income_min']}}"
                               data-max="{{Collector::get('calculatorsSettings')['cash']['monthly_income_max']}}"></div>
                    </div>
                </div>
                <div class="field">
                    <label>{{__('Сумма кредита')}}<span>{{__('UAH')}}</span></label>
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
                <div class="field">
                    <label>{{__('На срок')}}<span>{{__('мес.')}}</span></label>
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
            </div>

            @include('partials.calculators.partials.cash_table')

            <div class="submit btn btn_red">
                <input type="submit" class="input_btn" value="{{__('заказать кредит')}}" onclick="return false;" data-popup="popup_apply_form">
            </div>
        </form>
    </div>
</div>

