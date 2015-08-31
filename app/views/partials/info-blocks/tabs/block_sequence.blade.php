<div class="credit_card_how_to_use_tabs js_tabs {{ $block->is_info_block_bordered ? 'info_block_bordered' : '' }} {{ $block->is_info_block_gray ? 'info_block_bg_gray' : '' }}" data-autoheight="true">
    <div class="max_width">
        <h2>{{$block->t('title')}}</h2>
        <div class="credit_card_how_to_use_tabs_head js_tabs_head">
            @foreach($block->children as $tab)
                @if ($tab->children->count() && $tab->isActive())
                    <div class="tab">{{$tab->t('title')}}</div>
                @endif
            @endforeach
        </div>
        <div class="credit_card_how_to_use_tabs_body js_tabs_body">
            @foreach($block->children as $tab)
                @if ($tab->children->count() && $tab->isActive())
                    <div class="tab">
                        <div class="tab_inner">
                            <ul class="steps_list">
                                @foreach($tab->children as $slide)
                                    <li>
                                        <div class="number">{{$loop->index1}}</div>
                                        <p>{{$slide->t('title')}}</p>

                                        @if ($slide->t('benefits'))
                                            <?php $benefits = explode('|', $slide->t('benefits')); ?>

                                            @foreach($benefits as $benefit)
                                                <p class="faded">{{$benefit}}</p>
                                            @endforeach
                                        @endif

                                        @if ($slide->link && $slide->t('label'))
                                            <p><a class="btn btn_yellow" href="{{geturl($slide->link)}}"><span>{{$slide->t('label')}}</span></a></p>
                                        @else
                                            @if ($loop->first && $loop->parent->first)
                                                <p><a class="btn btn_yellow" data-popup="popup_packet_form"><span>{{__('заказать')}}</span></a></p>
                                            @endif
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            <div class="clear"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
