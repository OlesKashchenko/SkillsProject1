@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_prices_tabs js_tabs">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>

            <div class="transfer_page_prices_tabs_head js_tabs_head js_tabs_head">
                @foreach($block->children as $tab)
                    @if ($tab->children->count() && $tab->isActive())
                        <div class="tab">{{$tab->t('title')}}</div>
                    @endif
                @endforeach
            </div>

            <div class="transfer_page_prices_tabs_body js_tabs_body js_tabs_body">
                @foreach($block->children as $tab)
                    @if ($tab->children->count() && $tab->isActive())
                        <div class="tab">
                            <table class="list_table">
                                <tr>
                                    @foreach($tab->children as $slide)
                                        @if ($slide->isActive())
                                            <td>
                                                <h3>{{$slide->t('short_description')}}</h3>
                                                <p>{{$slide->t('title')}}</p>
                                            </td>

                                            @if ($loop->index1 % 3 == 0)
                                                </tr>
                                                <tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                            </table>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif