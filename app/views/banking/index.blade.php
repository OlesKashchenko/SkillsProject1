@extends('layouts.default')

@section('wrapper_class')@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    <div class="banking_intro">
        <div class="login_block">
            <div class="login_blur"></div>

            <h2>My Alfa Bank</h2>
            <p>интернет сервис</p>

            <form class="form" action="" method="post">
                <div class="field field_login_type">
                    <div class="input_holder">
                        <label class="custom_switcher white">
                            <span>Частный клиент</span><span class="switcher"></span><span>Малый бизнес</span>
                            <input type="checkbox"/>
                        </label>
                    </div>
                </div>

                <div class="field field_login"><!--.error-->
                    <div class="input_holder">
                        <div class="placeholder">Логин</div>
                        <input type="text" name="data[name]">
                        <div class="error_txt"><span>Неверный логин или пароль</span></div>
                    </div>
                </div>
                <div class="field field_password">
                    <div class="input_holder">
                        <div class="placeholder">Пароль</div>
                        <input type="password" name="data[name]">
                    </div>
                    <a href="" class="forgot_password">Напомнить?</a>
                </div>

                <div class="submit btn btn_red"><!--.shake-->
                    <input type="submit" class="input_btn" value="Войти">
                </div>

                <script>
                    // TODO: delete this script in back-end
                    $(function() {
                        $('.banking_intro .login_block .submit').click(function(e) {
                            e.preventDefault();
                            $('.banking_intro .login_block .field').eq(1).addClass('error');
                            $('.banking_intro .login_block .submit').addClass('shake');
                        });
                    })
                </script>
            </form>

            <div class="new_user_link">Новым пользователям</div>
        </div><!--.login_block-->
    </div><!--.banking_intro-->

    <div class="banking_slider_block bg_gray">
        <div class="max_width">
            <h2>Как пользоваться</h2>
            <p>простые видеоинструкции</p>
            <ul class="bxslider">
                <li class="has_video">
                    <img src="/images/samples/banking_slider_1_1.jpg" alt=""/>
                    <a href="" class="btn_play"></a>
                </li>
                <li class="has_video">
                    <img src="/images/samples/banking_slider_1_2.jpg" alt=""/>
                    <a href="" class="btn_play"></a>
                </li>
                <li class="has_video">
                    <img src="/images/samples/banking_slider_1_3.jpg" alt=""/>
                    <a href="" class="btn_play"></a>
                </li>
            </ul>
        </div>
    </div><!--.banking_slider_block-->

    <div class="banking_slider_block">
        <div class="max_width">
            <h2>Возможности интернет-банка<br/>
                <span class="red">Альфа-Банк Україна</span></h2>
            <ul class="bxslider" data-animation="fade">
                <li class="text_left">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Простые денежные переводы</h3>
                                <p>Чтобы отправить деньги родным и близким, больше не нужно идти в банк. В интернет- банке легко перевести деньги на другой счет или карту.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_2_1.png" alt=""/>
                </li>
                <li class="text_left">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Простые денежные перекиды</h3>
                                <p>Чтобы отправить деньги родным и близким, просто отправьте их. Отдайте курьеру и он все сделает за вас.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_2_2.png" alt=""/>
                </li>
                <li class="text_left">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Массовые денежные переводы</h3>
                                <p>Чтобы отправить родным и близким что-то, кроме денег, приходити в наш банк. У нас помогут забрать все, что вы с собой принесете.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_2_3.png" alt=""/>
                </li>
            </ul>
        </div>
    </div><!--.banking_slider_block-->

    <div class="banking_slider_block">
        <div class="max_width">
            <h2>Мобильное приложение</h2>
            <ul class="bxslider" data-animation="fade">
                <li class="text_center">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Автоматические платежи</h3>
                                <p>Чтобы отправить деньги родным и близким, больше не нужно идти в банк. В интернет- банке легко перевести деньги на другой счет или карту.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_3_1.png" alt=""/>
                </li>
                <li class="text_center">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Автоматические люди</h3>
                                <p>Чтобы отправить деньги родным и близким, просто отправьте их. Отдайте курьеру и он все сделает за вас.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_3_2.png" alt=""/>
                </li>
                <li class="text_center">
                    <div class="text">
                        <div class="dtable">
                            <div class="dtcell">
                                <h3>Автоматические начисления</h3>
                                <p>Чтобы отправить родным и близким что-то, кроме денег, приходити в наш банк. У нас помогут забрать все, что вы с собой принесете.</p>
                            </div>
                        </div>
                    </div>
                    <img src="/images/samples/banking_slider_3_3.png" alt=""/>
                </li>
            </ul>
        </div>
    </div><!--.banking_slider_block-->

    <div class="play_store_block">
        <h4>Интеренет-банк доступен</h4>
        <a href=""><i class="icon icon_apple"></i> App Store</a>
        <a href=""><i class="icon icon_gplay"></i> Google Play</a>
    </div><!--.play_store_block-->

    <div class="banking_sms_banking">
        <h2>СМС банкинг</h2>

        <div class="banking_sms_banking_text">
            <div>
                <h4>СМС информирование</h4>
                <p>Подключите услугу Альфа-Чек и получайте смс-уведомления обо всех операциях по карте в режиме онлайн.
                    Это необходимо для контроля операций по вашей карте.</p>
            </div>
            <div>
                <h4>СМС подтверждение</h4>
                <p>Для подтверждения операций в My Alfa-Bank нужен одноразовый цифровой пароль, который Вы получаете в sms-сообщении.</p>
            </div>
        </div>
    </div><!--.banking_sms_banking-->

    <div class="banking_security">
        <h2>Безопасность</h2>

        <div class="banking_security_img">
            <img src="/images/banking_security.png" alt=""/>

            <div class="banking_security_hint type_1">
                <span>1</span>
                <div class="banking_security_hint_text">
                    <h4>Защищенное соединение</h4>
                    <p>Проверяйте, действительно ли соединение происходит в защищенном режиме SSL.
                        В правом нижнем углу Вашего веб-браузера долженбыть изображен значок закрытого замка.</p>
                </div>
            </div>
            <div class="banking_security_hint type_2">
                <span>2</span>
                <div class="banking_security_hint_text">
                    <h4>Нужен только логин и пароль</h4>
                    <p>Для подтверждения операций в My Alfa-Bank нужен одноразовый цифровой пароль,
                        который Вы получаете в смс-сообщении.</p>
                </div>
            </div>
        </div>
    </div><!--.banking_security-->

    <div class="faq_block bg_gray">
        <h2>Вопросы и ответы</h2>
        <div class="max_width">
            <div class="faq_question">
                <div class="faq_title">Что такое льготный период по кредитной карте, сколько он длится?</div>
                <div class="faq_text">
                    <div class="faq_text_inner">
                        Льготный период – время, в течение которого банк дает возможность Вам использовать кредитную карту для расчетов в торгово-сервисных сетях по льготной процентной ставке 0,01%.
                        Такая ставка применяется только при условии полного погашения всей суммы задолженности, которая существует на конец дня расчетного периода по карте.
                        (Расчетный период – период, за который Банк производит начисления процентов,
                        формирует отчет о состоянии счета и выставляет платежи к оплате) 1-ый льготный период начинается в дату оформления договора.
                        Все последующие – на следующий день от даты оформления каждого месяца.
                    </div>
                </div>
            </div><!--.faq_question-->

            <div class="faq_question">
                <div class="faq_title">Какие реквизиты банка (общие) мне нужны для пополнения карточного счета?</div>
                <div class="faq_text">
                    <div class="faq_text_inner">
                        Льготный период – время, в течение которого банк дает возможность Вам использовать кредитную карту для расчетов в торгово-сервисных сетях по льготной процентной ставке 0,01%.
                        Такая ставка применяется только при условии полного погашения всей суммы задолженности, которая существует на конец дня расчетного периода по карте.
                        (Расчетный период – период, за который Банк производит начисления процентов,
                        формирует отчет о состоянии счета и выставляет платежи к оплате) 1-ый льготный период начинается в дату оформления договора.
                        Все последующие – на следующий день от даты оформления каждого месяца.
                    </div>
                </div>
            </div><!--.faq_question-->

            <div class="faq_question last">
                <div class="faq_title">Как я могу узнать о поступлении денежных средств на оплату кредита?</div>
                <div class="faq_text">
                    <div class="faq_text_inner">
                        Льготный период – время, в течение которого банк дает возможность Вам использовать кредитную карту для расчетов в торгово-сервисных сетях по льготной процентной ставке 0,01%.
                        Такая ставка применяется только при условии полного погашения всей суммы задолженности, которая существует на конец дня расчетного периода по карте.
                        (Расчетный период – период, за который Банк производит начисления процентов,
                        формирует отчет о состоянии счета и выставляет платежи к оплате) 1-ый льготный период начинается в дату оформления договора.
                        Все последующие – на следующий день от даты оформления каждого месяца.
                    </div>
                </div>
            </div><!--.faq_question-->
        </div>
    </div><!--.faq_block-->
@stop