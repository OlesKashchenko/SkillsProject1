<!--<script>visible_popup = 'popup_apply_form'</script>-->
<div class="popup popup_side none popup_apply_form">
    <div class="popup_content">
        <h3>{{__('Оформить заявку')}}</h3>
        <form class="form form_apply_form" action="" method="post" id="apply_form_credit">
            <input type="hidden" id="id_catalog" name="id_catalog" value="{{isset($page) ? $page->id : ''}}">

            <?php
                $applyFormType = '';
                $types = Config::get('orders.types');
                foreach ($types as $typeName => $typeProducts) {
                    if (isset($page) && in_array($page->id, $typeProducts)) {
                        $applyFormType = $typeName;
                        break;
                    }
                }
            ?>

            <input type="hidden" name="apply_form_type" value="{{$applyFormType}}">

            {{-- Custom fields for the different products apply forms will be here --}}
            @yield('custom_fields')

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
            <div class="field">
                <label>{{__('Эл. адрес')}}</label>
                <div class="input_holder">
                    <input type="text" name="email">
                </div>
            </div>
            <div class="field">
                <label>{{__('Вид занятости')}}</label>
                <div class="input_holder select_holder">
                    <select class="custom_select" name="occupation">
                        @foreach($occupations as $occupation)
                            <option value="{{$occupation->id}}">{{$occupation->t('title')}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <label>{{__('Серия и номер паспорта')}}</label>
                <div class="input_holder">
                    <input type="text" name="passport">
                </div>
            </div>
            <div class="field">
                <label>{{__('ИНН')}}</label>
                <div class="input_holder">
                    <input type="text" name="inn" maxlength="12">
                </div>
            </div>
            <div class="field field_checkbox">
                <div class="input_holder">
                    <label class="custom_checkbox"><input type="checkbox" name="confirm"> {{__('Я согласен на')}}</label> <a href="" data-popup="popup_apply_form_text">{{__('обработку моих данных')}}</a>
                </div>
            </div>
            <div class="submit btn btn_big btn_red">
                <input type="submit" class="input_btn" value="{{__('отправить')}}" onclick="jQuery('#apply_form_credit').submit(); return false;">
            </div>
        </form>
    </div>
    <span class="close"></span>
</div>
