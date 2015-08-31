@if (isset($newItem) && $newItem)
    <div class="page_news_all_holder">
        <a href="{{$newItem->getUrl()}}">
            <div class="page_news_all_news {{$newItem->preview ? 'img' : ''}}">
                <div class="bg_img">
                    <img src="{{asset($newItem->getImageSource('original', 'preview'))}}">
                </div>
                <span>{{$newItem->t('title')}}</span>
                <p>{{$newItem->getDate()}}</p>
            </div>
        </a>
    </div>
@endif