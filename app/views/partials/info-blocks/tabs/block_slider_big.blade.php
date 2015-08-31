<div class="deposit_page_slider_tabs js_tabs {{ $block->is_info_block_bordered ? 'info_block_bordered' : '' }}" data-autoheight="true">
    <div class="max_width">
        <h2>{{$block->t('title')}}</h2>

        @if ($block->children->count())
            <div class="deposit_page_slider_tabs_head js_tabs_head">
                @foreach($block->children as $tab)
                    @if ($tab->children->count() && $tab->isActive())
                        <div class="tab">{{$tab->t('title')}}</div>
                    @endif
                @endforeach
            </div>

            <div class="deposit_page_slider_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->children->count() && $tab->isActive())
                        <div class="tab">
                            <div class="tab_inner">
                                <div class="slider_holder">
                                    <ul class="bxslider" data-animation="fade">
                                        @foreach($tab->children as $slide)
                                            <li class="text_left">
                                                <div class="text">
                                                    <h3>{{$slide->t('title')}}</h3>

                                                    @if ($slide->t('short_description'))
                                                        <p>{{$slide->t('short_description')}}</p>
                                                    @endif
                                                </div>

                                                @if ($slide->getImageSource('original', 'preview'))
                                                    <img src="{{asset($slide->getImageSource('original', 'preview'))}}" alt="{{$slide->t('title')}}" />
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
