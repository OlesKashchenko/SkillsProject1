@if (isset($nextPage) && $nextPage)
    <a href="{{geturl($nextPage->getUrl())}}" class="{{$nextPageClass}}">
        <p>{{__('следующая страница')}}</p>
        <span>{{$nextPage->t('title')}}</span>
    </a>
@else
    <a href="{{geturl($firstPage->getUrl())}}" class="{{$nextPageClass}}">
        <p>{{__('следующая страница')}}</p>
        <span>{{$firstPage->t('title')}}</span>
    </a>
@endif
