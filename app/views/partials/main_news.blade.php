@if (isset($mainNews) && $mainNews->count())
    <div class="main_news">
        <div class="max_width">
            <div class="main_news_tabs">
                @foreach($mainNews as $mainNew)
                    @if ($mainNew->news->count())
                        <div class="main_news_tabs_item">{{$mainNew->t('title')}}</div>
                    @endif
                @endforeach
            </div>
            <div class="main_news_tabs_body">
                @foreach($mainNews as $mainNew)
                    @if ($mainNew->news->count())
                        <div class="main_news_tabs_body_item">
                            <div class="bxslider no_click">
                                <ul>
                                    <li>
                                        @foreach($mainNew->news as $newItem)
                                            <a href="{{$newItem->getUrl()}}">
                                                @if ($newItem->preview)
                                                    <i class="img-holder">
                                                        <img src="{{asset($newItem->getImageSource('original', 'preview'))}}" alt="{{$newItem->t('title')}}"/>
                                                    </i>
                                                @endif
                                                <p>{{$newItem->t('title')}}</p>
                                                <span>{{$newItem->getDate()}}</span>
                                            </a>
                                            @if ($loop->index1 % 3 == 0 && $mainNew->news->count() > $loop->index1)
                                                </li><li>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
