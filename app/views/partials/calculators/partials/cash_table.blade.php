@if (isset($calculationsCredit) && $calculationsCredit)
    <div class="form_infobar" id="cash_calculator_table">
        <div class="infobar_part_1">
            <div class="title">{{__('сумма кредита')}}</div>
            <div class="descr">{{isset($calculationsCredit['credit_amount']) ? $calculationsCredit['credit_amount'] : ''}} {{ __($calculationsCredit['currency'])}}</div>
        </div>
        <div class="infobar_part_2">
            <div class="title">{{__('на срок')}}</div>
            <div class="descr">{{isset($calculationsCredit['term']) ? $calculationsCredit['term'] : ''}} {{__('мес')}}</div>
        </div>
        <div class="infobar_part_3">
            <div class="title">{{__('ежемесячный платеж')}}</div>
            <div class="descr">{{isset($calculationsCredit['sum']) ? $calculationsCredit['sum'] : ''}} {{ __($calculationsCredit['currency'])}}</div>
        </div>
    </div>
@endif
