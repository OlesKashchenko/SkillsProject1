@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_restrictions">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>

            <div class="transfer_page_restrictions_tabs js_tabs" data-autoheight="true">
                <div class="transfer_page_restrictions_tabs_head js_tabs_head">
                    @foreach($block->children as $tab)
                        @if ($tab->isActive() && $tab->t('text'))
                            <div class="tab">{{$tab->t('title')}}</div>
                        @endif
                    @endforeach
                </div>

                <div class="transfer_page_restrictions_tabs_body js_tabs_body">
                    @foreach($block->children as $tab)
                        @if ($tab->isActive() && $tab->t('text'))
                            <div class="tab">
                                <div class="tab_inner">
                                    {{$tab->t('text')}}
                                    <div class="clear"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif