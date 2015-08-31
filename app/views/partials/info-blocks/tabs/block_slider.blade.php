<div class="credit_card_slider">
    <h2>{{$block->t('title')}}</h2>

    @if ($block->t('short_description'))
        <div class="subtitle">{{$block->t('short_description')}}</div>
    @endif

    @if ($block->children->count())
        <div class="credit_card_slider_tabs js_tabs" data-autoheight="true">
            <div class="max_width">
                <div class="credit_card_slider_tabs_head js_tabs_head">
                    @foreach($block->children as $tab)
                        @if ($tab->children->count() && $tab->isActive())
                            <div class="tab">{{$tab->t('title')}}</div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="credit_card_slider_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->children->count() && $tab->isActive())
                        <div class="tab">
                            <div class="tape_block tab_inner">
                                    <div class="tape_bg"></div>
                                    <div class="tape_holder">
                                        <div class="tape_hand"><img src="{{asset($tab->getImageSource('original', 'image_background'))}}" alt=""/></div>
                                        <div class="tape_items">
                                            @foreach($tab->children as $slide)
                                                @if (!$slide->isActive())
                                                    @continue
                                                @endif

                                                <a href="javascript:void(0);" class="tape_item" data-id="{{$slide->id}}" data-popup="popup_text">
                                                    <h3>​{{$slide->t('title')}}</h3>
                                                    <p>{{$slide->t('short_description')}}</p>
                                                    <span class="link_more">{{__('подробнее')}}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tape_controls"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>

@if ($block->children->count())
    @section('custom_popups')
        @foreach($block->children as $tab)
            @if ($tab->children->count() && $tab->isActive())
                @foreach($tab->children as $slide)
                    @if (!$slide->isActive())
                        @continue
                    @endif

                    @include('partials.popups.text_popup', ['id' => $slide->id, 'title' => $slide->t('title'), 'text' => $slide->t('description')])
                @endforeach
            @endif
        @endforeach
    @stop
@endif
