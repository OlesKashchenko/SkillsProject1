@if ($block->isActive() && $block->children->count())
    <div class="deposit_page_bonus_tabs js_tabs">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>
            <div class="deposit_page_bonus_tabs_head js_tabs_head">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->t('text'))
                        <div class="tab">{{$tab->t('title')}}</div>
                    @endif
                @endforeach
            </div>

            <div class="deposit_page_bonus_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->isActive() && $tab->t('text'))
                        <div class="tab">
                            {{$tab->t('text')}}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
