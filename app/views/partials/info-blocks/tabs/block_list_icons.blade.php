@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_how_to_use_tabs js_tabs">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>

            <div class="transfer_page_how_to_use_tabs_head js_tabs_head">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->children->count())
                        <div class="tab">{{$tab->t('title')}}</div>
                    @endif
                @endforeach
            </div>

            <div class="transfer_page_how_to_use_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->children->count())
                        <div class="tab">
                            @foreach($tab->children as $slide)
                                @if ($slide->children->count() && $slide->isActive())
                                    <h3>{{$slide->t('title')}}</h3>

                                    @if ($loop->first)
                                        <div class="transfer_logo_holder">
                                            @foreach($slide->children as $icon)
                                                @if ($icon->isActive())
                                                    <a href="{{$icon->link}}"><div class="transfer_logo"><img src="{{asset($icon->getImageSource('original', 'preview'))}}" alt=""/></div></a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="transfer_channels_holder">
                                            @foreach($slide->children as $icon)
                                                @if ($icon->isActive())
                                                    <div class="transfer_channel">{{$icon->t('title')}}</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif