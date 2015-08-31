@if (isset($calculations) && $calculations)
    <div class="form_infobar" id="deposit_calculator_table">
        <div class="infobar_part_1">
            <div class="title">{{__('стартовая сумма')}}</div>
            <div class="descr" id="dotation_descr_deposit">{{isset($calculations['amount']) ? $calculations['amount'] : ''}} {{ __($calculations['currency'])}}</div>
        </div>
        <div class="infobar_part_2">
            <div class="title">{{__('сумма пополнений')}}</div>
            <div class="descr" id="replenishment_descr_deposit">{{isset($calculations['installment']) ? $calculations['installment'] : ''}} {{__($calculations['currency'])}}</div>
        </div>
        <div class="infobar_part_3">
            <div class="title" id="percent_deposit">{{isset($calculations['percent']) ? $calculations['percent'] : ''}}% {{__('годовых')}}</div>
            <div class="descr" id="income_descr_deposit">{{isset($calculations['sum']) ? $calculations['sum'] : ''}} {{__($calculations['currency'])}}</div>
        </div>
    </div>
@endif