<div class="tab">
    <div class="tab_inner">
        <form class="form" action="" id="calculator_deposit" data-is-main="1">
            <div class="field_group">
                <div class="field field_with_selector">
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
                            <option value="uah">UAH</option>
                            <option value="usd">USD</option>
                            <option value="eur">EUR</option>
                        </select>
                    </div>
                </div>
                <div class="field">
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
                <div class="field">
                    <label>{{__('Ежемесячное пополнение')}} <span id="currency_label"></span></label>
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
            </div>

            @include('partials.calculators.partials.deposit_table_main')

            <div class="profit">{{__('Вы получите')}} <span class="sum"></span></div>

            <div class="submit btn btn_red">
                <a href="javascript:void(0);" class="input_btn" onclick="Calculator.toDepositPage();">{{__('Заказать депозит')}}</a>
            </div>
        </form>
    </div>
</div>
