@if (isset($menuItems) && $menuItems->count())
    <div class="investor_menu">
        <ul>
            <i class="close_submenu"></i>

            @foreach($menuItems as $menuItem)
                <li {{ $menuItem->getUrl() == Request::path() ? 'class="active"' : '' }}><a href="{{geturl($menuItem->getUrl())}}">{{$menuItem->t('title')}}</a></li>
            @endforeach
        </ul>
    </div>
@endif