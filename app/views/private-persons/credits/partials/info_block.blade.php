@if (isset($block) && $block->isActive() && $block->count())
    <?php

    $isAutoHeight = false;
    $isShortLength = false;
    $isSlider = false;
    $isSequence = false;
    if ($block->info_block_type == 'tab' && $block->children->count()) {
        foreach ($block->children as $tab) {
            if (in_array($tab->info_block_tab_type, array('image_list'))) {
                $isAutoHeight = true;
            }

            if (in_array($tab->info_block_tab_type, array('description_double'))) {
                $isShortLength = true;
            }

            if (in_array($tab->info_block_tab_type, array('image_description_slider'))) {
                $isSlider = true;
            }

            if (in_array($tab->info_block_tab_type, array('sequence'))) {
                $isSequence = true;
            }
        }
    }

    ?>

    {{-- С табами --}}
    @if ($block->info_block_type == 'tab')

        @if ($isSequence)

            <div class="credit_card_how_to_use_tabs js_tabs">
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
                                    <ul class="steps_list">
                                        @foreach($tab->children as $slide)
                                            <li>
                                                <div class="number">{{$loop->index1}}</div>
                                                <p>{{$slide->t('title')}}</p>

                                                <?php $benefits = explode('|', $slide->t('benefits')); ?>

                                                @foreach($benefits as $benefit)
                                                    <p class="faded">{{$benefit}}</p>
                                                @endforeach

                                                {{--
                                                @if ($loop->first)
                                                    <p><a class="btn btn_yellow" href="{{geturl('map')}}"><span>{{__('на карте')}}</span></a></p>
                                                @endif
                                                --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        @elseif ($isSlider)

            <div class="credit_card_slider">
                <h2>{{$block->t('title')}}</h2>

                @if ($block->t('short_description'))
                    <div class="subtitle">{{$block->t('short_description')}}</div>
                @endif

                @if ($block->children->count())
                    <div class="credit_card_slider_tabs js_tabs">
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
                                        <div class="tape_block">
                                            <div class="tape_bg"></div>
                                            <div class="tape_holder">
                                                <div class="tape_hand"><img src="{{asset($tab->getImageSource('original', 'image_background'))}}" alt=""/></div>
                                                <div class="tape_items">
                                                    @foreach($tab->children as $slide)
                                                        @if (!$slide->isActive())
                                                            @continue
                                                        @endif

                                                        <a href="" class="tape_item">
                                                            <h3>​{{$slide->t('title')}}</h3>
                                                            <p>{{$slide->t('short_description')}}</p>
                                                            <span class="link_more">{{__('подробнее')}}</span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tape_controls"></div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        @else

            <div class="credit_page_tabs {{ $block->is_info_block_gray ? 'bg_gray' : '' }} js_tabs {{ $isShortLength ? 'length_short' : '' }}" {{ $isAutoHeight ? 'data-autoheight="true"' : '' }}>
                <div class="max_width">
                    @if ($block->info_block_title_type == 'title_outer')
                        <h2>{{$block->t('title')}}</h2>
                    @endif

                    @if ($block->children->count())
                        <div class="credit_page_tabs_head js_tabs_head">
                            @foreach($block->children as $tab)
                                @if ($tab->isActive() && in_array($tab->info_block_tab_type, array('image_list', 'description_list')) && $tab->children->count())
                                    <div class="tab">{{$tab->t('title')}}</div>
                                @elseif ($tab->isActive())
                                    <div class="tab">{{$tab->t('title')}}</div>
                                @endif
                            @endforeach
                        </div>

                        <div class="credit_page_tabs_body js_tabs_body">
                            @foreach($block->children as $tab)
                                @if (!$tab->info_block_tab_type || !$tab->isActive())
                                    @continue
                                @endif

                                @if ($tab->info_block_tab_type == 'image_list')
                                    @if ($tab->children->count())
                                        <div class="tab half_right_only">
                                            <div class="tab_inner">
                                                <div class="img_holder">
                                                    <img src="{{asset($tab->getImageSource('original', 'image_background'))}}" alt="{{$tab->t('title')}}"/>
                                                </div>

                                                @if ($tab->t('short_description'))
                                                    <p class="size_bigger">{{$tab->t('short_description')}}</p>
                                                @endif

                                                <ul class="order_type_brick">
                                                    @foreach($tab->children as $slide)
                                                        @if (!$slide->isActive())
                                                            @continue
                                                        @endif

                                                        <li class="li_{{$loop->index1}}">{{$slide->t('title')}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                @elseif ($tab->info_block_tab_type == 'description_list')
                                    @if ($tab->children->count())
                                        <div class="tab">
                                            <div class="tab_half left">
                                                @if ($tab->t('short_description'))
                                                    <p class="size_bigger">{{$tab->t('short_description')}}</p>
                                                @endif
                                            </div>

                                            @if ($tab->children->count())
                                                <div class="tab_half right">
                                                    <ul>
                                                        @foreach($tab->children as $slide)
                                                            <li>{{$slide->t('title')}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                @elseif ($tab->info_block_tab_type == 'description')
                                    <div class="tab">
                                        <p>{{strip_tags($tab->t('description'))}}</p>
                                    </div>

                                @elseif ($tab->info_block_tab_type == 'description_double')
                                    <?php $parts = explode('|', strip_tags($tab->t('description'))); ?>
                                    <div class="tab">
                                        @if (isset($parts[0]))
                                            <div class="tab_half left">
                                                <p>{{$parts[0]}}</p>
                                            </div>
                                        @endif
                                        @if (isset($parts[1]))
                                            <div class="tab_half right">
                                                <p>{{$parts[1]}}</p>
                                            </div>
                                        @endif
                                    </div>

                                @elseif ($tab->info_block_tab_type == 'list')
                                    @if ($tab->children->count())
                                        <?php $children = $tab->children->chunk(2); ?>
                                        <div class="tab">
                                            <div class="tab_inner">
                                                @foreach($children as $child)
                                                    <div class="tab_half {{$loop->first ? 'left' : 'right'}}">
                                                        <ul>
                                                            @foreach($child as $item)
                                                                <li>{{$item->t('title')}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    @endif

                                @elseif ($tab->info_block_tab_type == 'image_description_slider')
                                    @if ($tab->children->count())
                                        <?php $children = $tab->children->chunk(2); ?>
                                        <div class="tab">
                                            <div class="tab_inner">
                                                @foreach($children as $child)
                                                    <div class="tab_half {{$loop->first ? 'left' : 'right'}}">
                                                        <ul>
                                                            @foreach($child as $item)
                                                                <li>{{$item->t('title')}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        @endif

    {{-- Без табов --}}
    @elseif ($block->info_block_type == 'no_tab')

        @if ($block->info_block_tab_type == 'infograph')
            @if ($block->children->count() && $block->isActive())
                <div class="credit_card_bonus_program">
                    <h2>{{$block->t('title')}}</h2>
                    <ul>
                        @foreach($block->children as $child)
                            <li class="type_{{$loop->index1}}">
                                <div class="dtable">
                                    <div class="dtcell">{{$child->t('title')}}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif

    @endif
@endif