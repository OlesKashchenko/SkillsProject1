@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_prices_tabs type_2 js_tabs">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>

            <div class="transfer_page_prices_tabs_head js_tabs_head js_tabs_head">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->t('text'))
                        <div class="tab">{{$tab->t('title')}}</div>
                    @endif
                @endforeach
            </div>

            <div class="transfer_page_prices_tabs_body js_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->t('text'))
                        <div class="tab">
                            <div>{{$tab->t('text')}}</div>

                            <div class="clear"></div>
                            {{--<div class="transfer_page_prices_tabs_hint">При сумме перевода свыше 10 000грн, в каждом интервале 500грн дополнительно удерживается комиссия 15 грн.</div>--}}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif