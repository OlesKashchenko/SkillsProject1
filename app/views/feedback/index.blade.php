@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    <div class="feedback_intro">
        <h2>{{__('Мы на связи 24 / 7')}}</h2>
        <p>{{__('Здесь вы можете найти ответы на свои вопросы')}}</p>

        <div class="search_block">
            <form class="form" action="" method="post">
                <div class="field">
                    <div class="input_holder">
                        <div class="placeholder">Поиск вопроса по тегам</div>
                        <input type="text" name="data[search]" id="inputFeedbackSearch" value=" " oninput="Feedbacks.initFilter();">
                    </div>
                </div>

                <div class="submit">
                    <input type="submit" value=" " onclick="Feedbacks.initFilter();return false;">
                </div>
            </form>
        </div>
    </div>

    @if (isset($feedbacks) && $feedbacks->count())
        <?php
                $categories = array();
            foreach ($feedbacks as $feedbackCategory) {
                $categories[$feedbackCategory->id] = $feedbackCategory->id_category;
            }
        ?>
    <div class="faq_block" id="feedback">
        <h2>{{__('Вопросы и ответы')}}</h2>
        <div class="max_width">
        @foreach($feedbacks as $feedback)
            @if (!$feedback->t('answer'))
                @continue
            @endif

            <div class="faq_question" data-id-category='{{$feedback['id_category'] ? json_encode($categories[$feedback['id']]) : ''}}' data-title-category ='{{$feedback->category ? $feedback->category->t('title') : ''}}'>
                <div class="faq_title">{{$feedback->t('question')}}</div>
                <div class="faq_text">
                    <div class="faq_text_inner">{{$feedback->t('answer')}}</div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @endif

    <div class="feedback_form_block">
        <div class="max_width">
            <h2>{{__('Не нашли ответ на свой вопрос?')}}<br/>{{__('Задайте его нам')}}</h2>
            <div class="feedback_form_tabs js_tabs">
                <div class="feedback_form_tabs_head js_tabs_head">
                    <div class="tab">{{__('Для частных лиц')}}</div>
                    <div class="tab">{{__('Для корпоративных клиентов')}}</div>
                </div>
                <div class="feedback_form_tabs_body js_tabs_body">
                    <div class="tab">
                        <form class="form" action="" method="post" id="feedback_form_private">
                            <div class="field">
                                <label>{{__('Ваше имя')}}</label>
                                <div class="inputs_group">
                                    <div class="input_holder">
                                        <input type="text" name="last_name">
                                        <div class="placeholder">{{__('Фамилия')}}</div>
                                    </div>
                                    <div class="input_holder">
                                        <input type="text" name="first_name">
                                        <div class="placeholder">{{__('Имя')}}</div>
                                    </div>
                                    <div class="input_holder">
                                        <input type="text" name="patronymic_name">
                                        <div class="placeholder">{{__('Отчество')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_phone">
                                <label>{{__('Мобильный номер')}}</label>
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
                                <label>{{__('Эл. адреса')}}</label>
                                <div class="input_holder">
                                    <input type="text" name="email">
                                </div>
                            </div>
                            <div class="field field_subject">
                                <label>{{__('Тема вопроса')}}</label>
                                <div class="input_holder">
                                    <select class="custom_select" name="subject">
                                        @foreach($themes as $theme)
                                            <option value="{{$theme->id}}">{{$theme->t('title')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>{{__('Ваш вопрос')}}</label>
                                <div class="input_holder">
                                    <textarea name="question"></textarea>
                                </div>
                            </div>
                            {{--
                            <div class="field field_captcha">
                                <label>Сколько будет</label>
                                <div class="captcha_holder">
                                    <img src="images/samples/captcha.jpg" alt=""/>
                                    <span></span>
                                </div>
                                <div class="input_holder">
                                    <input type="text" name="data[captcha]">
                                </div>
                            </div>
                            --}}

                            <div class="submit btn btn_red">
                                <input type="submit" class="input_btn" value="{{__('Отправить')}}" onclick="jQuery('#feedback_form_private').submit(); return false;">
                            </div>
                        </form>
                    </div>

                    <div class="tab">
                        <form class="form" action="" method="post" id="feedback_form_client">
                            <div class="field">
                                <label>{{__('Ваше имя')}}</label>
                                <div class="input_holder">
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div class="field field_phone">
                                <label>{{__('Мобильный номер')}}</label>
                                <div class="input_holder select_holder">
                                    <select class="custom_select" name="phone_code">
                                        @foreach($operatorCodes as $code)
                                            <option value="+38 {{$code}}">+38 {{$code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input_holder">
                                    <input type="text" name="phone_number">
                                </div>
                            </div>
                            <div class="field">
                                <label>{{__('Эл. адреса')}}</label>
                                <div class="input_holder">
                                    <input type="text" name="email">
                                </div>
                            </div>
                            <div class="field field_subject">
                                <label>{{__('Тема вопроса')}}</label>
                                <div class="input_holder">
                                    <select class="custom_select" name="subject">
                                        @foreach($themes as $theme)
                                            <option value="{{$theme->id}}">{{$theme->t('title')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>{{__('Ваш вопрос')}}</label>
                                <div class="input_holder">
                                    <textarea name="question"></textarea>
                                </div>
                            </div>
                            {{--
                            <div class="field field_captcha">
                                <label>Сколько будет</label>
                                <div class="captcha_holder">
                                    <img src="/images/samples/captcha.jpg" alt=""/>
                                    <span></span>
                                </div>
                                <div class="input_holder">
                                    <input type="text" name="data[captcha]">
                                </div>
                            </div>
                            --}}

                            <div class="submit btn btn_red">
                                <input type="submit" class="input_btn" value="{{__('Отправить')}}" onclick="jQuery('#feedback_form_client').submit(); return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="toggle_block">
        <div class="toggle_block_header">
            <h2>{{__('SMS инфо')}}</h2>
        </div>

        <div class="toggle_block_body">
            <div class="toggle_block_body_inner">
                <div class="max_width">
                    <div class="feedback_sms_info">
                        <div class="icon_phone_holder"><i class="icon icon_phone"></i></div>
                        <div class="subtitle">
                            {{__('Для получения информации по балансу кредитного договора и платежной карты достаточно отправить короткую sms-команду на номер')}}
                            <i class="hint_holder">
                                <i class="hint wide">
                                    {{__('услуга доступна с зарегистрированного в системах Банка мобильного номера телефона для всех GSM операторов Украины, стоимость смс согласно тарифов Вашего оператора')}}
                                </i>
                            </i>
                        </div>

                        <div class="feedback_sms_phone">
                            <span>3</span>
                            <span>3</span>
                            <span>4</span>
                            <span>4</span>
                        </div>

                        <ul class="feedback_sms_phone_list">
                            @foreach($helpers as $helper)
                                <li>
                                    <div class="description_name">{{$helper->t('title')}}</div>
                                    <div class="description_info">{{$helper->t('description')}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="toggle_block_footer"><div class="toggle_icon"></div></div>
    </div>

    <div class="toggle_block closed">
        <div class="toggle_block_header">
            <h2>{{__('Контакт центр')}}</h2>
        </div>
        <div class="toggle_block_body">
            <div class="toggle_block_body_inner">
                <div class="max_width">
                    <div class="feedback_contact_center_info">
                        {{$page->t('description')}}
                    </div>
                </div>
            </div>
        </div>

        <div class="toggle_block_footer"><div class="toggle_icon"></div></div>
    </div>
@stop

