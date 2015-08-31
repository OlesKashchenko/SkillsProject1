@extends('layouts.default')

@section('wrapper_class')
    page_news_all_text
@stop

@section('seo_title'){{$page->t('seo_title')}}@stop
@section('seo_description'){{$page->t('seo_description')}}@stop
@section('seo_keywords'){{$page->t('seo_keywords')}}@stop

@section('main')
    @include('partials.breadcrumbs', array('custom' => array('url' => '/about', 'title' => __('О банке'))))

    <div class="page_news_all">
        @if (isset($sections) && $sections->count())
            <div class="page_news_all_menu">
                @foreach($sections as $section)
                    <a {{$section->getUrl() == Request::path() ? 'class="active"' : ''}} href="{{geturl($section->getUrl())}}">{{$section->t('title')}}</a>
                @endforeach
                <span class="news_all_filter">{{__('Фильтр')}}</span>
            </div>

            <div class="news_all_filter_div">
                <form id="filter-params" action="" method="get">
                    <div class="news_all_filter_div_cat">
                        @foreach($sections as $section)
                            @if ($section->id == $page->id && $section->newsCategories->count())
                                <small>{{__('подкатегории')}}</small>
                                @foreach($section->newsCategories as $newsCategory)
                                    <div class="field field_checkbox">
                                        <div class="input_holder">
                                            <label class="custom_checkbox" onclick="Press.doFilter();">
                                                <input type="checkbox" name="categories[]" value="{{$newsCategory->id}}" {{isset($filters['categories']) && in_array($newsCategory->id, $filters['categories']) ? 'checked' : ''}}> {{$newsCategory->t('title')}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>

                    <div class="field field_year news_all_filter_div_year">
                        <small>{{__('год')}}</small>
                        <div class="input_holder select_holder">
                            <select class="custom_select" name="year" onchange="Press.doFilter();">
                                <option value="2015" {{isset($filters['year']) && trim($filters['year']) == '2015' ? 'selected' : ''}}>2015</option>
                                <option value="2014" {{isset($filters['year']) && trim($filters['year']) == '2014' ? 'selected' : ''}}>2014</option>
                                <option value="2013" {{isset($filters['year']) && trim($filters['year']) == '2013' ? 'selected' : ''}}>2013</option>
                                <option value="2012" {{isset($filters['year']) && trim($filters['year']) == '2012' ? 'selected' : ''}}>2012</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        @if (isset($news) && $news->count())
                <div class="page_news_all_wrapper">
                    @foreach($news as $newItem)
                        @include('about.press.partials.new_item')
                    @endforeach
                </div>

                <div class="page_news_all_add">
                    @if ($total > $perPage)
                        <i class="page_news_all_spinner"></i>
                        <p>{{__('Больше новостей')}}</p>
                        <input type="hidden" value="{{$perPage}}" id="load-skip-items"/>
                        <input type="hidden" value="{{$page->id}}" id="load-id-catalog"/>
                        {{--<span>Страница 1 с 4</span>--}}
                    @endif
                </div>
        @endif
    </div>
    <div class="page_news_all_footer">
        <div class="page_news_all_footer_div">
            <h3>Справка о банке</h3>
            <div class="fl_left">
                <span>Альфа-Банк Украина — крупный украинский банк, который входит в частную международ- ную группу «Альфа-Банк», представленную в 5 странах: Украине, России, Казахстане, Беларуси и Нидерландах.</span>
            </div>
            <div class="fl_right">
                <span>Мы предоставляем удобные современные банковские решения клиентам во всех сегментах, от частных лиц до крупнейших компаний, являясь одним из лидеров по внедрению новых технологий.</span>
                <span>Мы выполняем свою миссию удовлетворения ежедневных финансовых потребностей наших клиентов, обеспечивая простоту финансовых решений и предлагая инновационные сервисы, которые упрощают их жизнь и оставляют место для важного.</span>
            </div>
            <div class="footer_menu">
                <a href="">рейтинги</a>
                <a href="">достижения</a>
                <a href="">социальные инвестиции</a>
                <a href="">руководство</a>
                <a href="">структура собственности банка</a>
            </div>
        </div>
    </div>
@stop

@section('custom_scripts')
    <script src="{{asset('js/press.js')}}"></script>
@stop