@extends('layouts.default')

@section('wrapper_class')
    page_map
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    <div class="atms_block">
        <div class="max_width">
            <form class="form" action="" method="post" id="filter_offices_form">
                <div class="field field_search">
                    <div class="input_holder">
                        <div class="placeholder">{{__('Город, улица, станция метро')}}</div>
                        <input type="text" name="search" onclick="jQuery('#filter_offices_form').submit();">
                    </div>
                </div>

                <div class="submit">
                    <input type="submit" class="btn" value="">
                </div>
                <div class="clear"></div>
                {{--comment because of the task http://vis.worksection.com/project/86208/2559092/2708694/--}}
                {{--<div class="map_mode_toggle">
                    <a class="type_map act" href="javascript:void(0);" onclick="Map.changeMapShowType('map')">{{__('На карте')}}</a>
                    <a class="type_list" href="javascript:void(0);" onclick="Map.changeMapShowType('list')">{{__('Списком')}}</a>
                </div>--}}
                {{--comment because of the task http://vis.worksection.com/project/86208/2559092/2708694/--}}

                <div class="atms_filters js_tabs">
                    <div class="atms_filters_tabs_head js_tabs_head">
                        <div class="tab" data-office-type="office">{{__('Отделения')}}</div>
                        <div class="tab" data-office-type="atm">{{__('Банкоматы')}}</div>
                        <div class="tab" data-office-type="mini">{{__('Миниотделения')}}</div>
                    </div>
                    <div class="atms_filter_tabs js_tabs_body" style="height: 40px;">
                        <div class="tab">
                            {{--
                            <div class="column">
                                <h3>Категория 1</h3>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Платежи и переводы</label>
                                    </div>
                                </div>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Подключение My Alfa Bank</label>
                                    </div>
                                </div>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Получить кредит</label>
                                    </div>
                                </div>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Платежные карты</label>
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <h3>Категория 2</h3>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Больше услуг для Бизнеса</label>
                                    </div>
                                </div>
                                <div class="field field_checkbox">
                                    <div class="input_holder">
                                        <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> Персональное обслуживание</label>
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <h3>Время работы</h3>

                                <div class="field field_day_type">
                                    <div class="input_holder">
                                        <label class="custom_switcher">
                                            <span>Будні</span><span class="switcher"></span><span>Вихідні</span>
                                            <input type="checkbox"/>
                                        </label>
                                    </div>
                                </div>

                                <div class="field field_set_time">
                                    <div class="input_holder">
                                        <input type="text" name="data[time]">
                                        <div class="input_helper_draggable_time" data-min="480" data-max="1200"></div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>

                        <div class="tab">
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="atm_types[]" value="alfa"> {{__('Альфа-Банк')}}</label>
                                </div>
                            </div>
                            <div class="field field_checkbox">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="atm_types[]" value="atm"> АТМ</label>
                                </div>
                            </div>
                            <div class="field field_checkbox" style="display: none;">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="atm_subtypes[]" value="24/7"> 24 / 7</label>
                                </div>
                            </div>
                            <div class="field field_checkbox" style="display: none;">
                                <div class="input_holder">
                                    <label class="custom_checkbox"><input type="checkbox" name="atm_subtypes[]" value="cash-in"> Cash in</label>
                                </div>
                            </div>
                        </div>

                        <div class="tab"></div>
                    </div>
                </div>
            </form>
        </div>

        <div class="atm_map_holder">
            <div class="atm_map atm_map_onpage" id="map-onpage-canvas"></div>
        </div>

        {{--comment because of the task http://vis.worksection.com/project/86208/2559092/2708694/--}}

        {{--<div class="atm_map_list_holder">
            <div class="max_width">
                <div class="atm_map_list_head">
                    <div class="column">
                        <h3>{{__('Адрес')}}</h3>
                    </div>
                    <div class="column">
                        <h3>{{__('Время работы')}}</h3>
                    </div>
                    <div class="column">
                        <h3>{{__('Услуги')}}</h3>
                    </div>
                </div>

                <ul class="atm_map_list">
                    @foreach($officesMap as $officeMap)
                        @include('map.partials.list_item', compact('officeMap'))
                    @endforeach
                </ul>
            </div>
        </div>--}}
        {{--comment because of the task http://vis.worksection.com/project/86208/2559092/2708694/--}}
    </div>

    <div id="map-offices-popups">
        @foreach($officesMap as $officeMap)
            @include('partials.popups.office_info', compact('officeMap'))
        @endforeach
    </div>
@stop

@section('custom_scripts')
    <script src="{{asset('js/map.js')}}"></script>
    <script>
        Map.initialize(
            'map-onpage-canvas',
            { locations: {{json_encode($officesMap)}} }
        );
    </script>
@stop
