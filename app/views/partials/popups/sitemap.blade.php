<!--<script>visible_popup = 'popup_sitemap'</script>-->
<div class="popup none popup_sitemap">
    <div class="popup_content">
        <div class="search_block">
            <form class="form" action="" method="post">
                <div class="field">
                   {{-- <div class="input_holder">
                        <div class="placeholder">{{__('Поиск')}}</div>
                        <input type="text" name="data[search]">
                    </div>--}}
                </div>

                <div class="submit">
                    <input type="submit" class="btn" value="">
                </div>
            </form>
        </div>

        <div class="sitemap">
            <div class="sitemap_tabs">
                @foreach ($root as $rootNode)
                    @foreach ($rootNode->children as $node)
                        @if (!$node->isActive() || !$node->isMainMenu())
                            @continue
                        @endif

                        <a href="{{geturl($node->getUrl())}}">{{$node->t('title')}}</a>
                    @endforeach
                @endforeach
            </div>

            <div class="sitemap_tabs_body">
                @foreach ($root as $rootNode)
                    @foreach ($rootNode->children as $node)
                        @if (!$node->isActive() || !$node->isMainMenu())
                            @continue
                        @endif

                        <div class="sitemap_tabs_body_item">
                            @foreach ($node->children as $childNode)
                                @if (!$node->isActive())
                                    @continue
                                @endif

                                <div class="sitemap_list">
                                    <p>{{$childNode->t('title')}}</p>
                                    <ul>@if ($childNode->id != 7)
                                            @foreach ($childNode->children as $childNode2)
                                                @if (!$childNode2->isActive())
                                                    @continue
                                                @endif

                                                <li><a href="{{geturl($childNode2->getUrl())}}">{{$childNode2->t('title')}}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <span class="close color_light"></span>
</div>