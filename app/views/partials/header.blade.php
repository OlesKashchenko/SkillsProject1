<header class="header">
    <a class="logo" href="{{geturl('/')}}"><img src="{{asset('images/logo_header.png')}}" alt="{{__('Главная страница')}}"/></a>
    <ul class="lang">
        @if (App::getLocale() == 'ua')
            <li class="act"><span>ua</span></li>
            <li><a href="javascript:void(0);" onclick="App.changeLocale('ru');">ru</a></li>
        @elseif (App::getLocale() == 'ru')
            <li><a href="javascript:void(0);" onclick="App.changeLocale('ua');">ua</a></li>
            <li class="act"><span>ru</span></li>
        @elseif (App::getLocale() == 'en')
            <li><a href="javascript:void(0);" onclick="App.changeLocale('ua');">ua</a></li>
            <li><a href="javascript:void(0);" onclick="App.changeLocale('ru');">ru</a></li>
        @endif

        <li class="disabled">
            <a href="">en</a>
            <div class="hint">Language is temporarily unavailable</div>
        </li>
    </ul>

    <a href="http://a-club.alfabank.com.ua/" class="a_club">A-CLUB</a>

    <div class="nav_right">
        @foreach ($root as $rootNode)
            @foreach ($rootNode->children as $node)
                @if (!$node->isActive() || !$node->isTopMenu())
                    @continue
                @endif

                <a href="{{$node->getCustomLink() ?: geturl($node->getUrl())}}" {{geturl($node->getUrl()) == Request::url() ? 'class="act"' : ''}}>{{$node->t('title')}}</a>

                @if ($node->slug == 'investor-relations')
                    <span class="vr"></span>
                @endif
            @endforeach
        @endforeach
    </div>

    <div class="nav_main {{!in_array(Request::path(), array('/', 'ua', 'ru', 'en')) ? 'short' : ''}}">
        <div class="nav_main_inner">
            <a class="nav_main_logo" href="{{geturl('/')}}"></a>

            <div class="nav_links">
                @foreach ($root as $rootNode)
                    @foreach ($rootNode->children as $node)
                        @if (!$node->isActive() || !$node->isMainMenu())
                            @continue
                        @endif

                        @if ($node->isMainMenuLink())
                            <a href="{{$node->getCustomLink() ?: geturl($node->getUrl())}}">{{$node->t('title')}}</a>
                        @else
                            <a>{{$node->t('title')}}</a>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div class="btn"><a href="https://my.alfabank.com.ua/login{{--{{geturl('banking')}}--}}" target="_blank">{{__('Интернет-банк')}}</a></div>
            <div class="fake_sidebar_icon"></div>

            <div class="nav_main_sub">
                {{--
                @foreach ($root as $rootNode)
                    @foreach ($rootNode->children as $node)
                        @if (!$node->isActive() || !$node->isMainMenu())
                            @continue
                        @endif

                        @if ($node->children->count())
                            <div class="nav_main_sub_item {{$loop->first && in_array(Request::path(), array('/', 'ua', 'ru', 'en')) ? 'act' : ''}}">
                                @foreach ($node->children as $childNode)
                                    @if (!$childNode->isActive() || !$childNode->isMainMenu())
                                        @continue
                                    @endif

                                    <a class="sub_0_{{$loop->index}}" href="{{$childNode->getCustomLink() ?: geturl($childNode->getUrl())}}">{{$childNode->t('title')}}</a>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                @endforeach
                --}}

                @foreach ($root as $rootNode)
                    @foreach ($rootNode->children as $node)
                        @if (!$node->isActive() || !$node->isMainMenu())
                            @continue
                        @endif

                        @if ($node->children->count())
                            <div class="nav_main_sub_item {{$loop->first && in_array(Request::path(), array('/', 'ua', 'ru', 'en')) ? 'act' : ''}}">
                                <div class="nav_main_sub_menu_holder">
                                    <table>
                                        <tr>
                                            @foreach ($node->children as $childNode)
                                                @if (!$childNode->isActive() || !$childNode->isMainMenu())
                                                    @continue
                                                @endif

                                                {{-- {{$loop->parent->index}} --}}
                                                <td><a class="sub_0_{{$loop->index}}" href="{{$childNode->getCustomLink() ?: geturl($childNode->getUrl())}}">{{$childNode->t('title')}}</a></td>

                                                @if (!$loop->last)
                                                    <td class="margin_elem"></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</header>
