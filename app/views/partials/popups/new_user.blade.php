<!--<script>visible_popup = 'popup_new_user'</script>-->
<div class="popup popup_side none popup_new_user">
    <div class="popup_content">
        <h3>Новый пользователь</h3>
        <form class="form form_new_user step_1" action="" method="post">
            <div class="form_new_user_page page_1">
                <div class="new_user_steps">шаг 1 из 2</div>

                <div class="field">
                    <label>Номер карты или счета</label>
                    <div class="input_holder">
                        <input type="text" name="data[card_num]">
                    </div>
                </div>

                <div class="field field_birthday">
                    <label>Ваша дата рождения</label>
                    <div class="input_holder select_holder">
                        <select class="custom_select" name="data[birth_day]">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="input_holder select_holder">
                        <select class="custom_select" name="data[birth_month]">
                            <option value="1">Январь</option>
                            <option value="2">Февраль</option>
                            <option value="3">Март</option>
                            <option value="4">Апрель</option>
                            <option value="5">Май</option>
                            <option value="6">Июнь</option>
                        </select>
                    </div>
                    <div class="input_holder select_holder">
                        <select class="custom_select" name="data[birth_year]">
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                        </select>
                    </div>
                </div>

                <div class="field field_checkbox">
                    <div class="input_holder">
                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Я являюсь владельцем данного договора / счета</label>
                    </div>
                </div>

                <a class="btn btn_red form_go_next_step" href=""><span>Далее</span></a>
            </div><!--.form_new_user_page-->

            <div class="form_new_user_page page_2">
                <a class="form_go_prev_step" href=""></a>
                <div class="new_user_steps">шаг 2 из 2</div>

                <div class="field">
                    <label>Логин</label>
                    <div class="input_holder">
                        <input type="text" name="data[login]">
                    </div>
                </div>

                <div class="field field_password">
                    <label>Пароль</label>
                    <div class="input_holder">
                        <input type="password" name="data[login]">
                    </div>
                </div>
                <div class="field field_password_repeat">
                    <label>Повторить</label>
                    <div class="input_holder">
                        <input type="password" name="data[login]">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="password_hint">Пароль должен состоять не менее чем с 8ми символов.<br/>
                    Лучше использовать как буквы так и цифры (большие и меленькие).</div>

                <div class="field">
                    <label>Эл. адрес</label>
                    <div class="input_holder">
                        <input type="text" name="data[login]">
                    </div>
                </div>

                <div class="field field_phone">
                    <label>Номер мобильного телефона</label>
                    <div class="input_holder select_holder">
                        <select class="custom_select" name="data[phone_code]">
                            <option value="+38 098">+38 098</option>
                            <option value="+38 097">+38 097</option>
                            <option value="+38 096">+38 096</option>
                            <option value="+38 066">+38 066</option>
                            <option value="+38 050">+38 050</option>
                            <option value="+38 088">+38 088</option>
                        </select>
                    </div>
                    <div class="input_holder">
                        <input type="text" name="data[phone_number]">
                    </div>
                </div>

                <div class="submit btn btn_red">
                    <input type="submit" class="input_btn" value="Зарегистрироваться">
                </div>
            </div><!--.form_new_user_page-->

            <script>
                // TODO: delete it in back-end
                $(function(){
                    $('.form_new_user .form_go_next_step').click(function(e) {
                        e.preventDefault();
                        $('.form_new_user').removeClass('step_1').addClass('step_2');
                    });
                    $('.form_new_user .form_go_prev_step').click(function(e) {
                        e.preventDefault();
                        $('.form_new_user').removeClass('step_2').addClass('step_1');
                    });
                });
            </script>
        </form>
    </div>
    <span class="close"></span>
</div><!--.popup_new_user-->