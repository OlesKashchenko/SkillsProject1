<div class="popup popup_side none popup_apply_form_deposit" id="popup_apply_form_deposit">
    <div class="popup_content">
        <form class="form form_apply_deposit step_1" action="/apply-form/deposit" method="post" id="apply_form_deposit">
            <input type="hidden" id="id_catalog" name="id_catalog" value="{{isset($page) ? $page->id : ''}}">
            <input type="hidden" name="apply_form_type" value="deposit">
            <input type="hidden" name="deposit_amount" value="{{{trim(Input::get('deposit_amount')) ? : Collector::get('calculatorsSettings')['deposit']['deposit_amount_default']}}}">
            <input type="hidden" name="term" value="{{{trim(Input::get('term')) ? : Collector::get('calculatorsSettings')['deposit']['term_default']}}}">
            <input type="hidden" name="monthly_installment" value="{{{trim(Input::get('monthly_installment')) ? : Collector::get('calculatorsSettings')['deposit']['monthly_installment_default']}}}">
            <input type="hidden" name="currency" value="uah">
            <input type="hidden" name="interest_payment_percent" value="{{isset($maxPercents['max_percent']) ? $maxPercents['max_percent'] : 0}}">
            <input type="hidden" name="interest_payment_type" value="{{isset($maxPercents['max_percent_type']) ? $maxPercents['max_percent_type'] : 'capitalize'}}">

            <div class="form_apply_deposit_page page_1">

            </div>
            <div class="form_apply_deposit_page page_2">
                <a class="form_go_prev_step" href=""></a>
                <h3>{{__('Оформить заявку')}}</h3>

                <div class="info_panel">
                    <span class="amount"></span>{{__('вы получите за')}}
                    <span class="months_count" style="margin-right: 0;font-size: inherit;">{{trim(Input::get('term')) ? : Collector::get('calculatorsSettings')['deposit']['term_default']}}</span> {{__('месяцев доверия')}}
                </div>

                <div class="field field_client_type">
                    <div class="input_holder">
                        <label class="custom_switcher">
                            <span>{{__('Не клиент банка')}}</span>
                            <span class="switcher"></span>
                            <span>{{__('Клиент банка')}}</span>
                            <input type="checkbox" name="bank_client">
                        </label>
                    </div>
                </div>

                <div class="fields_group">
                    <div class="field">
                        <label>{{__('ФИО')}}</label>
                        <div class="input_holder">
                            <input type="text" name="last_name" maxlength="32" data-cyrillic="1">
                            <div class="placeholder">{{__('Фамилия')}}</div>
                        </div>
                    </div>
                    <div class="field field_no_label">
                        <div class="input_holder">
                            <input type="text" name="first_name" maxlength="32" data-cyrillic="1">
                            <div class="placeholder">{{__('Имя')}}</div>
                        </div>
                    </div>
                    <div class="field field_no_label">
                        <div class="input_holder">
                            <input type="text" name="patronymic_name" maxlength="32" data-cyrillic="1">
                            <div class="placeholder">{{__('Отчество')}}</div>
                        </div>
                    </div>
                </div>

                <div class="field field_phone">
                    <label>{{__('Номер мобильного телефона')}}</label>
                    <div class="input_holder select_holder">
                        <select class="custom_select" name="phone_code">
                            @foreach($operatorCodes as $code)
                                <option value="+38 {{$code}}">+38 {{$code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_holder">
                        <input type="text" name="phone_number" maxlength="7">
                    </div>
                </div>

                <div class="field field_checkbox">
                    <div class="input_holder">
                        <label class="custom_checkbox" for="confirm"><input type="checkbox" name="confirm">{{__('Я согласен на обработку моих данных')}}</label>
                    </div>
                </div>

                <div class="submit btn btn_big btn_red">
                    <input type="submit" class="input_btn" value="{{__('отправить')}}" onclick="jQuery('#apply_form_deposit').submit(); return false;">
                </div>
            </div>
        </form>
    </div>
    <span class="close"></span>
</div>
</span>
</div>
