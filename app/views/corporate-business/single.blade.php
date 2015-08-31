@extends('layouts.default')

@section('wrapper_class')
    page_business
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', ['type' => true])

    <div class="business_page_intro">
        <div class="bg_holder">
            <img src="{{asset($page->getImageSource('original', 'image_background_single'))}}" alt="{{$page->t('title')}}"/>
        </div>
        <h3>{{$page->t('title')}}</h3>
        <div class="sub_title">{{$page->t('label')}}</div>
    </div>

    <div class="business_page_call_to_action">
        <a class="btn btn_red" href="javascript:void(0);" data-popup="popup_apply_form"><span>{{__('заказать')}}</span></a>
    </div>

    <div class="business_page_peculiarity_tabs js_tabs" data-autoheight="true">
        <div class="max_width">
            <h2>Особенности сервиса</h2>

            <div class="business_page_peculiarity_tabs_head js_tabs_head">
                <div class="tab">Преимущества</div>
                <div class="tab">Выгоды</div>
                <div class="tab">Доп. возможности</div>
            </div><!--.business_page_peculiarity_tabs_head-->
        </div>

        <div class="business_page_peculiarity_tabs_body js_tabs_body">
            <div class="max_width">
                <div class="tab">
                    <div class="tab_inner">
                        <div class="table_holder">
                            <table>
                                <tr>
                                    <td><p>Выгодный % за снятие наличности в UAH</p></td>
                                    <td><p>Открытие 4 счетов в 4 валютах (UAH, USD, EUR, RUB) бесплатно</p></td>
                                    <td><p>Начисление % дохода на остаток свыше 50 тыс UAH</p></td>
                                </tr>
                                <tr>
                                    <td><p>Подключение клиент-банка и интернет-банка бесплатно</p></td>
                                    <td><p>Неограниченное количество бесплатных платежей внутри Альфа-Банка</p></td>
                                    <td><p>Бесплатное внесение наличных на счет через кассу до 50 тыс UAH</p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab"><div class="tab_inner"></div></div>
                <div class="tab"><div class="tab_inner"></div></div>
            </div>
        </div><!--.business_page_peculiarity_tabs_body-->
    </div><!--.business_page_peculiarity_tabs-->

    <div class="deposit_page_slider_tabs js_tabs">
        <div class="max_width">
            <h2>Блооооок кросс продаж</h2>
            <div class="deposit_page_slider_tabs_head js_tabs_head">
                <div class="tab">My Alfa Bank</div>
                <div class="tab">Пакеты услуг</div>
            </div><!--.deposit_page_slider_tabs_head-->

            <div class="deposit_page_slider_tabs_body js_tabs_body">
                <div class="tab">
                    <div class="slider_holder">
                        <ul class="bxslider" data-animation="fade">
                            <li class="text_left">
                                <div class="text">
                                    <h3>Простые денежные переводы</h3>
                                    <p>Чтобы отправить деньги родным и близким, больше не нужно идти в банк. В интернет- банке легко перевести деньги на другой счет или карту.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_1.png" alt=""/>
                            </li>
                            <li class="text_left">
                                <div class="text">
                                    <h3>Простые денежные перекиды</h3>
                                    <p>Чтобы отправить деньги родным и близким, просто отправьте их. Отдайте курьеру и он все сделает за вас.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_2.png" alt=""/>
                            </li>
                            <li class="text_left">
                                <div class="text">
                                    <h3>Массовые денежные переводы</h3>
                                    <p>Чтобы отправить родным и близким что-то, кроме денег, приходити в наш банк. У нас помогут забрать все, что вы с собой принесете.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_3.png" alt=""/>
                            </li>
                        </ul>
                    </div><!--.slider_holder-->
                </div>
                <div class="tab">
                    <div class="slider_holder">
                        <ul class="bxslider" data-animation="fade">
                            <li class="text_left">
                                <div class="text">
                                    <h3>Простые денежные перекиды</h3>
                                    <p>Чтобы отправить деньги родным и близким, просто отправьте их. Отдайте курьеру и он все сделает за вас.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_2.png" alt=""/>
                            </li>
                            <li class="text_left">
                                <div class="text">
                                    <h3>Простые денежные переводы</h3>
                                    <p>Чтобы отправить деньги родным и близким, больше не нужно идти в банк. В интернет- банке легко перевести деньги на другой счет или карту.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_1.png" alt=""/>
                            </li>
                            <li class="text_left">
                                <div class="text">
                                    <h3>Массовые денежные переводы</h3>
                                    <p>Чтобы отправить родным и близким что-то, кроме денег, приходити в наш банк. У нас помогут забрать все, что вы с собой принесете.</p>
                                </div>
                                <img src="images/samples/banking_slider_2_3.png" alt=""/>
                            </li>
                        </ul>
                    </div><!--.slider_holder-->
                </div>
            </div><!--.deposit_page_slider_tabs_body-->
        </div>
    </div><!--.deposit_page_slider_tabs-->

    <div class="business_page_how_to_get_tabs bg_gray js_tabs" data-autoheight="true">
        <div class="max_width">
            <h2>Оформляя в Альфа Банк</h2>

            <div class="business_page_how_to_get_tabs_head js_tabs_head">
                <div class="tab">Как получить</div>
                <div class="tab">В пакет входит</div>
                <div class="tab">Необходимые документы</div>
            </div><!--.transfer_page_how_to_use_tabs_head-->

            <div class="business_page_how_to_get_tabs_body js_tabs_body">
                <div class="tab">
                    <div class="tab_inner">
                        <ul class="steps_list">
                            <li>
                                <div class="number">1</div>
                                <p>Заполните заявку во всплывающей форме</p>
                                <p><a class="btn btn_yellow" href=""><span>заполнить</span></a></p>
                            </li>
                            <li>
                                <div class="number">2</div>
                                <p>Ответьте на все вопросы оператора с колл центра</p>
                            </li>
                            <li>
                                <div class="number">3</div>
                                <p>Посетите наше отделение и заберите все готовые документы</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab"><div class="tab_inner"></div></div>
                <div class="tab"><div class="tab_inner"></div></div>
            </div><!--.transfer_page_how_to_use_tabs_body-->
        </div>
    </div><!--.transfer_page_how_to_use_tabs-->
@stop