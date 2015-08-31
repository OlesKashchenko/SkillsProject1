@extends('layouts.default')

@section('wrapper_class')
    page_about
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')

    <div class="boxes_intro">
        <!-- row 1 -->
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
    </div>

    {{--Банк сегодня--}}
    @if($articles['bank-today']->isActive())
    <div class="bank_today">
        <div class="max_width">
            <h2>{{$articles['bank-today']->t('title')}}</h2>

            <div class="dtable">
                <div class="dtcell"><p>{{$articles['bank-today']->t('short_description')}}</p></div>
                <div class="dtcell">{{$articles['bank-today']->t('description')}}</div>
            </div>
            <div class="links_line">
            <?php $blocks = array('achievements', 'mission', 'worth', 'strategy', 'history'); ?>

            @foreach ($blocks as $block)
                @if (isset($articles[$block]) && $articles[$block] && $articles[$block]->isActive())
                    <a href="{{$articles[$block]->link}}">{{$articles[$block]->t('title')}}</a>
                @endif
            @endforeach

            {{--
            @if($articles['achievements']->isActive())
                <a href="{{$articles['achievements']->link}}">{{$articles['achievements']->t('title')}}</a>
            @endif
            @if($articles['mission']->isActive())
                <a href="{{$articles['mission']->link}}">{{$articles['mission']->t('title')}}</a>
            @endif
            @if($articles['worth']->isActive())
                <a href="{{$articles['worth']->link}}">{{$articles['worth']->t('title')}}</a>
            @endif
            @if($articles['strategy']->isActive())
                <a href="{{$articles['strategy']->link}}">{{$articles['strategy']->t('title')}}</a>
            @endif
            @if($articles['history']->isActive())
                <a href="{{$articles['history']->link}}">{{$articles['history']->t('title')}}</a>
            @endif
            --}}

            </div>
        </div>
    </div><!--.bank_today-->
    @endif
    @if($articles['quality']->isActive())
    <div class="about_quality">
        <div class="max_width">
            <h2>{{$articles['quality']->t('title')}}</h2>
            <p>{{$articles['quality']->t('short_description')}}</p>
            <a class="btn btn_white" href="{{$articles['quality']->link}}"><span>{{__('подробнее')}}</span></a>
        </div>
    </div><!--.about_quality-->
    @endif

    @include('partials.info-blocks.custom.reporting', ['reporting' => $reporting])

    @if($articles['investments']->isActive())
    <div class="bank_splitted">
        <div class="bank_splitted_half left">
            <img src="{{asset($articles['investments']->getImageSource('original', 'image_background'))}}" alt="{{$articles['investments']->t('title')}}"/>
        </div><!--.bank_splitted-->

        <div class="bank_splitted_half right is_stretching">
            <h2>{{$articles['investments']->t('title')}}</h2>
            {{$articles['investments']->t('description')}}

            <div class="links_line">
                @if($articles['sponsorship']->isActive())
                    <a href="{{$articles['sponsorship']->link}}">{{$articles['sponsorship']->t('title')}}</a>
                @endif
                @if($articles['charity']->isActive())
                    <a href="{{$articles['charity']->link}}">{{$articles['charity']->t('title')}}</a>
                @endif
            </div>
        </div><!--.bank_splitted_right-->
    </div><!--.bank_splitted-->
    @endif

    @if (isset($articles['press']) && $articles['press'])
        <div class="bank_splitted has_fullbg">
            <div class="bank_splitted_half left">
                <h2>{{$articles['press']->t('title')}}</h2>
                {{$articles['press']->t('description')}}
            </div>

            <div class="bank_splitted_half right">
                <div class="contacts_holder no_heading_text">
                    {{$articles['press']->t('short_description')}}
                </div>
            </div>

            <div class="links_line">
                @if (isset($pressSections) && $pressSections->count())
                    @foreach($pressSections as $pressSection)
                        @if ($pressSection->isMain())
                            <a href="{{geturl($pressSection->getUrl())}}">{{$pressSection->t('title')}}</a>
                        @endif
                    @endforeach
                @endif

                <div class="btn_holder">
                    <a class="btn btn_yellow" data-popup="popup_send_form" href="">
                        <span>{{__('написать в пресс-центр')}}</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($articles['information']->isActive())
    <div class="investor_reports">
        <div class="max_width">
            <h2>{{$articles['information']->t('title')}}</h2>
            <div class="clear"></div>

            <div class="investor_reports_tabs js_tabs" data-autoheight="true">
                <div class="investor_reports_tabs_head js_tabs_head">
                    @foreach($articles['information']->children as $articlesTab)
                        @if($articlesTab->isActive() && trim($articlesTab['text']))
                            <div class="tab">{{$articlesTab->t('title')}}</div>
                        @endif
                    @endforeach
                </div><!--.investor_reports_tabs_head-->

                <div class="investor_reports_tabs_body js_tabs_body">
                    @foreach($articles['information']->children as $articlesTab)
                        @if($articlesTab->isActive() && trim($articlesTab['text']))
                            <div class="tab">
                                <div class="tab_inner">
                                    {{$articlesTab->t('text')}}
                                    @if($articlesTab->children->count())
                                        <ul>
                                            @foreach($articlesTab->children as $file)
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
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div><!--.investor_reports_tabs_body-->
            </div><!--.investor_reports_tabs-->
        </div>
    </div><!--.investor_reports-->
    @endif

    @if($articles['socials']->isActive() && $articles['socials']->children->count())
        <div class="bank_social_media">
            <div class="max_width">
                <h2>{{$articles['socials']->t('title')}}</h2>
                    {{$articles['socials']->t('description')}}
                <div class="sn_btns">
                    @foreach($articles['socials']->children as $tab)
                        <a class="sn_{{$tab->slug}}" href="{{$tab->link}}" target="_blank">
                            {{$tab->t('title')}}
                            <span>{{$tab->t('short_description')}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div><!--.bank_social_media-->
    @endif

@stop

@section('custom_popups')
    @include('partials.popups.send_form')
@stop
