@extends('layouts.default')

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    <div class="boxes_intro">
        <div class="box medium">
            <a href="{{geturl('investor-relations/structure')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <span>{{__('Акционеры')}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="box big has_img">
            <a href="{{geturl('investor-relations/corporate')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <img src="/images/samples/about_02.jpg" alt="{{__('Корпоративное управление')}}"/>
                        <span>{{__('Корпоративное управление')}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="box medium">
            <a href="{{geturl('investor-relations/risks-management')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <span>{{__('Управление')}}<br/>{{__('рисками')}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="box medium">
            <div class="box_inner">
                <div class="box small">
                    <a href="{{geturl('investor-relations/revizijna-komisiya')}}" class="box_inner">
                        <div class="dtable">
                            <div class="dtcell">
                                <span>{{__('Ревизионная')}}<br/>{{__('комиссия')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box small has_img">
                    <a href="{{geturl('investor-relations/vnutrishnij-audit')}}" class="box_inner">
                        <div class="dtable">
                            <div class="dtcell">
                                <img src="/images/samples/about_06.jpg" alt=""/>
                                <span>{{__('Внутренний')}}<br/>{{__('аудит')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- row 2 -->
        <div class="box medium has_img">
            <a href="{{geturl('investor-relations/naglyadova-rada')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <img src="/images/samples/about_04.jpg" alt=""/>
                        <span>{{__('Наблюдательный')}}<br/>{{__('совет')}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="box medium">
            <div class="box_inner">
                <div class="box small has_img">
                    <a href="{{geturl('investor-relations/leadership')}}" class="box_inner">
                        <div class="dtable">
                            <div class="dtcell">
                                <img src="/images/samples/about_05.jpg" alt=""/>
                                <span>{{__('Правление')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="box small">
                    <a href="{{geturl('investor-relations/kerivnictvo')}}" class="box_inner">
                        <div class="dtable">
                            <div class="dtcell">
                                <span>{{__('Руководство')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="box medium">
            <a href="{{geturl('investor-relations/documents')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <span>{{__('Уставные документы')}}<br/>{{__('и лицензии')}}</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="box big has_img">
            <a href="{{geturl('investor-relations/info-show')}}" class="box_inner">
                <div class="dtable">
                    <div class="dtcell">
                        <img src="/images/samples/about_03.jpg" alt="{{__('Раскрытие информации')}}"/>
                        <span>{{__('Раскрытие информации')}}</span>
                    </div>
                </div>
            </a>
        </div>
    </div><!--.boxes_intro-->

    @include('partials.info-blocks.custom.reporting', ['reporting' => $blocks['reporting']])

    {{--Альфа Достижение--}}
    @if ($blocks['achievement']->isActive() && $blocks['achievement']->children->count())
        <div class="investor_rating">
            <div class="max_width">
                <a class="btn btn_yellow corner_btn" href="{{geturl('/about/achievements')}}"><span>{{$blocks['achievement']->t('title')}}</span></a>

                <div class="investor_rating_tabs js_tabs">
                    <div class="investor_rating_tabs_head js_tabs_head">
                        @foreach($blocks['achievement']->children as $achievementTab)
                            @if($achievementTab->isActive() && trim($achievementTab['benefits']))
                                <div class="tab">{{$achievementTab->t('title')}}</div>
                            @endif
                        @endforeach
                    </div>

                    <div class="investor_rating_tabs_body js_tabs_body">
                            @foreach($blocks['achievement']->children as $achievementBody)
                                @if($achievementBody->isActive())
                                    <div class="tab">
                                        {{$achievementBody->t('benefits')}}
                                        {{$achievementBody->t('benefits_description')}}
                                    </div>
                                @endif
                            @endforeach
                    </div><!--.investor_rating_tabs-->
                </div>
            </div>
        </div><!--.investor_rating-->
    @endif
    {{--Презентации--}}

    @if($blocks['presentations']->isActive() && $blocks['presentations']->children->count())
        <div class="investor_brief type_1">
            <div class="max_width">
                <div class="investor_brief_item type_1">
                    <h3>{{$blocks['presentations']->t('title')}}</h3>
                    <div class="select_holder mini_red">
                        <select class="custom_select" {{--onchange="App.initChangeYearPresentation();"--}}><!--delete class years_select-->
                            @foreach($blocks['presentations']->children as $year)
                                @if($year->children->count())
                                    <option option="{{$year->t('title')}}" {{--data-id-year="{{$year->id}}"--}}>{{$year->t('title')}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @foreach($blocks['presentations']->children as $year)
                        @if ($year->isActive() && $year->children->count())
                            <div class="slider_holder" {{--id="{{$year['title']}}" {{!$loop->first ? "style = 'display: none'" : ""}}--}} data-scroll-year="{{$year->title}}">{{--data-id-year="{{$year->id}}"--}}
                                <ul class="bxslider">
                                    @foreach($year->children as $presentation)
                                        @if ($presentation->isActive() && File::exists($presentation->file))
                                            <li>
                                                <a href="{{asset($presentation->file)}}" class="download_item">
                                                    <!-- 210x150 -->
                                                    <img src="{{asset($presentation->getImageSource('original', 'image_background'))}}" alt="{{$presentation->t('title')}}"/>
                                                    <span class="name">{{$presentation->t('title')}}</span>
                                                    <span class="size">{{Util::formatSizeUnits(File::size($presentation->file))}}</span>
                                                    <span class="type">{{File::extension($presentation->file)}}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div><!--.investor_brief_item-->
                {{--Стратегия развития--}}
                <div class="investor_brief_item type_2">
                    <h3>{{$blocks['strategy']->t('title')}}</h3>
                    <p>{{$blocks['strategy']->t('short_description')}}</p>

                    <div class="btn_holder">
                        <a class="btn btn_red" data-popup="popup_text" data-id="{{$blocks['strategy']->id}}" href=""><span>{{__('подробнее')}}</span></a>
                    </div>
                </div><!--.investor_brief_item-->
                {{--Долговые обязательства--}}
                <div class="investor_brief_item type_3">
                    <h3>{{$blocks['obligation']->t('title')}}</h3>
                    <p>{{$blocks['obligation']->t('short_description')}}</p>

                    <div class="btn_holder">
                        <a class="btn btn_red" data-popup="popup_investor" data-id="{{$blocks['obligation']->id}}"><span>{{__('подробнее')}}</span></a>
                    </div>
                </div><!--.investor_brief_item-->
            </div>
        </div><!--.investor_brief-->
    @endif
    {{--Информация для инвесторов--}}
    @if ($blocks['information']->isActive() && $blocks['information']->children->count())
        <div class="investor_reports">
            <div class="max_width">
                <h2>{{$blocks['information']->t('title')}}</h2>
                <div class="clear"></div>

                <div class="investor_reports_tabs js_tabs" data-autoheight="true">
                    <div class="investor_reports_tabs_head js_tabs_head">
                        @foreach($blocks['information']->children as $tabs)
                            @if($tabs->isActive() && $tabs->children->count())
                                <div class="tab">{{$tabs->t('title')}}</div>
                            @endif
                        @endforeach
                    </div><!--.investor_reports_tabs_head-->

                    <div class="investor_reports_tabs_body js_tabs_body">
                        @foreach($blocks['information']->children as $files)
                            @if($files->isActive() && $files->children->count())
                                <div class="tab">
                                    <div class="tab_inner">
                                        <ul>
                                            @foreach($files->children as $file)
                                                @if($file->isActive() && File::exists($file->file))
                                                    <li>
                                                        <a href="{{asset($file->file)}}" target="_blank">
                                                            {{$file->t('title')}}
                                                            <span class="type">{{File::extension($file->file)}}</span>
                                                            <span class="size">{{Util::formatSizeUnits(File::size($file->file))}}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>

                                        <div class="clear"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{--<div class="tab"></div>
                        <div class="tab"></div>--}}
                    </div><!--.investor_reports_tabs_body-->
                </div><!--.investor_reports_tabs-->
            </div>
        </div><!--.investor_reports-->
    @endif

    {{--Новости--}}
    @if (isset($news) && $news->count())
    <div class="investor_news">
        <div class="max_width">
            <h2>{{__('Новости')}}</h2>
            <div class="sider_holder">
                <div class="bxslider">
                    <ul>
                        <li>
                            @foreach($news as $newItem)
                                <a href="{{$newItem->getUrl()}}">
                                    @if ($newItem->preview)
                                        <i class="img-holder">
                                            <img src="{{asset($newItem->getImageSource('original', 'preview'))}}" alt="{{$newItem->t('title')}}"/>
                                        </i>
                                    @endif
                                    <p>{{$newItem->t('title')}}</p>
                                    <span>{{$newItem->getDate()}}</span>
                                </a>

                                @if ($loop->index1 % 3 == 0)
                                    </li>
                                    <li>
                                @endif
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--.investor_news-->
    @endif
    {{--Финансовый календарь--}}
    @if($blocks['calendar']->isActive())
        <div class="investor_calendar">
        <h2>{{$blocks['calendar']->t('title')}}</h2>
        <div class="drag_slider">
            <div class="bxslider">
                <ul>
                    @foreach($blocks['calendar']->children as $year)
                        @if($year->isActive() && $year->children->count())
                            <li data-year="{{$year->t('title')}}">
                                 @foreach($year->children as $items)
                                    @if($items->isActive())
                                        <div class="investor_calendar_item">
                                            <div class="date">{{$items->t('label')}}</div>
                                            <div class="subdate">{{$items->t('benefits')}}</div>
                                            <p>{{$items->t('benefits_description')}}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div><!--.bxslider-->

            <div class="drag_slider_controls">
                <div class="drag_slider_controls_dragbar"></div>
            </div><!--.drag_slider_controls-->
        </div><!--.drag_slider-->
    </div><!--.investor_calendar-->
    @endif

    {{--Контакты--}}
    @if($blocks['contacts']->isActive() && $blocks['contacts']->children->count())
        <div class="investor_contacts_tabs js_tabs" data-autoheight="true">
            <div class="max_width">

                <h2>{{$blocks['contacts']->t('title')}}</h2>
                <div class="investor_contacts_tabs_head js_tabs_head">
                    @foreach($blocks['contacts']->children as $contactTab)
                        @if($contactTab->isActive())
                            <div class="tab">{{$contactTab->t('title')}}</div>
                        @endif
                    @endforeach
                </div><!--.investor_contacts_tabs_head-->
            </div>

            <div class="investor_contacts_tabs_body js_tabs_body">
            @foreach($blocks['contacts']->children as $contactTab )
                @if($contactTab->isActive())
                    <div class="tab">
                        <div class="tab_inner">
                            {{$contactTab->t('benefits_description')}}
                                <div class="contacts_map_holder">

                                @if ($loop->first)
                                        <div class="contacts_map" id="contacts_map"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    @endif

    <div class="rss_subscribe_block">
        <div class="max_width">
            <h2>{{__('RSS подписка')}}</h2>

            <div class="rss_block">
                <form class="form" action="#" method="post" id="apply_rss_subscriber">
                    <div class="field">
                        <div class="input_holder">
                            <div class="placeholder">{{__('Введите эл. адрес')}}</div>
                            <input type="text" name="email">
                        </div>
                    </div>

                    <div class="submit btn btn_red">
                        <input type="submit" class="input_btn" value="Подписаться" onclick="jQuery('#apply_rss_subscriber').submit();return false;">
                    </div>
                </form>
            </div><!--.search_block-->
        </div>
    </div><!--.rss_subscribe_block-->

    @if (isset($officesMap) && $officesMap)
        @foreach($officesMap as $officeMap)
            @include('partials.popups.office_info', compact('officeMap'))
        @endforeach
    @endif
@stop

@section('custom_popups')
    @foreach($blocks as $key => $block)
        @if($key == "strategy")
            @include('partials.popups.popup_investor_info', ['block' => $blocks['strategy']])
        @elseif($key == "obligation")
            @include('partials.popups.popup_investors', ['block' => $blocks['obligation']])
        @endif
    @endforeach
@stop

@if (isset($officesMap) && $officesMap)
    @section('custom_scripts_additional')
        <div class="testtest"></div>
        <script src="{{asset('js/map.js')}}"></script>
        <script>
            Map.initialize(
                'contacts_map',
                {
                    locations:  {{json_encode($officesMap)}},
                    latitude:   {{$officesMap[0]['latitude']}},
                    longitude:  {{$officesMap[0]['longitude']}}
                });
        </script>
    @stop
@endif