<!--<script>visible_popup = 'popup_partner_form'</script>-->
<div class="popup popup_side none popup_partner_form">
    <div class="popup_content">
        <h3>{{__('Оформить заявку')}}</h3>
        <div class="subtitle">{{__('Чтобы стать партнером, достаточно заполнить и отправить заявку. После чего с вами свяжется менеджер банка, чтобы заключить агентский договор, в соответствии с кото- рым будет выплачиваться вознаграждение за привлеченных клиентов.')}}</div>
        <form class="form form_partner_form" action="" method="post" id="apply_form_partner">
            <h4>{{__('Ваши данные')}}</h4>
            <div class="fields_group">
                <div class="field">
                    <label>{{__('ФИО')}}</label>
                    <div class="input_holder">
                        <input type="text" name="last_name">
                        <div class="placeholder">{{__('Фамилия')}}</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="first_name">
                        <div class="placeholder">{{__('Имя')}}</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="patronymic_name">
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

            <h4>{{__('Кому рекомендуете?')}}</h4>
            <div class="fields_group">
                <div class="field">
                    <label>{{__('ФИО')}}</label>
                    <div class="input_holder">
                        <input type="text" name="partner_last_name">
                        <div class="placeholder">{{__('Фамилия')}}</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="partner_first_name">
                        <div class="placeholder">{{__('Имя')}}</div>
                    </div>
                </div>
                <div class="field field_no_label">
                    <div class="input_holder">
                        <input type="text" name="partner_patronymic_name">
                        <div class="placeholder">{{__('Отчество')}}</div>
                    </div>
                </div>
            </div>
            <div class="field field_phone">
                <label>{{__('Номер мобильного телефона')}}</label>
                <div class="input_holder select_holder">
                    <select class="custom_select" name="partner_phone_code">
                        @foreach($operatorCodes as $code)
                            <option value="+38 {{$code}}">+38 {{$code}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_holder">
                    <input type="text" name="partner_phone_number" maxlength="7">
                </div>
            </div>
            {{--
            <div class="field field_captcha">
                <label>{{__('Сколько будет')}}</label>
                <div class="captcha_holder">
                    <img src="images/samples/captcha.jpg" alt=""/>
                    <span></span>
                </div>
                <div class="input_holder">
                    <input type="text" name="captcha">
                </div>
            </div>
            --}}
            <div class="field field_checkbox">
                <div class="input_holder">
                    <label class="custom_checkbox"><input type="checkbox" name="confirm"> {{__('Я согласен на')}}</label> <a href="" data-popup="popup_apply_form_text">{{__('обработку моих данных')}}</a>
                </div>
            </div>
            <div class="submit btn btn_big btn_red">
                <input type="submit" class="input_btn" value="{{__('отправить')}}" onclick="jQuery('#apply_form_partner').submit(); return false;">
            </div>
        </form>
    </div>
    <span class="close"></span>
</div>