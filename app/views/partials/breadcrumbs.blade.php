@if (isset($custom) && $custom)
    <div class="breadcrumbs">
        <a href="{{geturl($custom['url'])}}" class="breadcrumbs_title">{{$custom['title']}}</a>
    </div>
@elseif (isset($breadcrumbs) && $breadcrumbs)
    <div class="breadcrumbs">

        @if (isset($type))
            @if (!$type)
                {{-- выводить название текущего раздела --}}
                <?php $crumb = last($breadcrumbs->crumbs); ?>

                <div class="breadcrumbs_title">{{$crumb['title']}}</div>
            @else
                {{-- выводить ссылку на родительский раздел --}}
                <?php

                $breadcrumbs->pop();
                $crumb = last($breadcrumbs->crumbs);

                ?>

                <a href="{{geturl($crumb['url'])}}" class="breadcrumbs_title">{{$crumb['title']}}</a>
            @endif
        @else
            @foreach($breadcrumbs->crumbs as $crumb)
                <a href="{{geturl($crumb['url'])}}" class="breadcrumbs_title">{{$crumb['title']}}</a>
            @endforeach
        @endif

        @if (isset($additionalBreadcrumbLinks) && $additionalBreadcrumbLinks)
            <div class="breadcrumbs_links">
                @foreach($additionalBreadcrumbLinks as $additionalBreadcrumbLink)
                    <a href="{{$additionalBreadcrumbLink['url']}}">{{$additionalBreadcrumbLink['title']}}</a>
                @endforeach
            </div>
         @endif
    </div>
@endif
