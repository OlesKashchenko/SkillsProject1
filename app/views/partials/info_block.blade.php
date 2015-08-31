@if (isset($block) && $block->isActive() && $block->count())
    <?php

    if ($block->info_block_type == 'tab' && $block->children->count()) {
        foreach ($block->children as $tab) {
            if ($tab->info_block_tab_type == 'image_list') {
                $isAutoHeight = true;
                break;
            }

            if ($tab->info_block_tab_type == 'description_double') {
                $isShortLength = true;
                break;
            }

            if ($tab->info_block_tab_type == 'image_description_slider') {
                $isSlider = true;
                break;
            }

            if ($tab->info_block_tab_type == 'sequence') {
                $isSequence = true;
                break;
            }

            if ($tab->info_block_tab_type == 'description_image_slider') {
                $isBigSlider = true;
                break;
            }

            if ($tab->info_block_tab_type == 'list_icons') {
                $isListIcons = true;
                break;
            }

            if ($tab->info_block_tab_type == 'rates') {
                $isRates = true;
                break;
            }

            if ($tab->info_block_tab_type == 'template_rates') {
                $isRatesTemplate = true;
                break;
            }

            if ($tab->info_block_tab_type == 'template_simple') {
                $isTemplateSimple = true;
                break;
            }

            if ($tab->info_block_tab_type == 'template_simple_alt') {
                $isTemplateSimpleAlt = true;
                break;
            }

            if ($tab->info_block_tab_type == 'template_simple_two') {
                $isTemplateSimpleTwo = true;
                break;
            }
        }
    }

    ?>

    @if ($block->info_block_type == 'tab')
        @if (isset($isSequence) && $isSequence)
            @include('partials.info-blocks.tabs.block_sequence', ['block' => $block])
        @elseif (isset($isSlider) && $isSlider)
            @include('partials.info-blocks.tabs.block_slider', ['block' => $block])
        @elseif (isset($isBigSlider) && $isBigSlider)
            @include('partials.info-blocks.tabs.block_slider_big', ['block' => $block])
        @elseif (isset($isListIcons) && $isListIcons)
            @include('partials.info-blocks.tabs.block_list_icons', ['block' => $block])
        @elseif (isset($isRates) && $isRates)
            @include('partials.info-blocks.tabs.block_rates', ['block' => $block])
        @elseif (isset($isRatesTemplate) && $isRatesTemplate)
            @include('partials.info-blocks.tabs.block_rates_template', ['block' => $block])
        @elseif (isset($isTemplateSimple) && $isTemplateSimple)
            @include('partials.info-blocks.tabs.block_template_simple', ['block' => $block])
        @elseif (isset($isTemplateSimpleAlt) && $isTemplateSimpleAlt)
            @include('partials.info-blocks.tabs.block_template_simple_alt', ['block' => $block])
        @elseif (isset($isTemplateSimpleTwo) && $isTemplateSimpleTwo)
            @include('partials.info-blocks.tabs.block_template_simple_two', ['block' => $block])
        @else
            <div class="credit_page_tabs {{ $block->is_info_block_gray ? 'bg_gray' : '' }} {{ $block->is_info_block_bordered ? 'info_block_bordered' : '' }} js_tabs {{ (isset($isShortLength) && $isShortLength) ? 'length_short' : '' }}" data-autoheight="true">
                <div class="max_width">
                    @if ($block->t('title'))
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

                                {{-- image_list, description_list, description, description_double, list_two, image_description_slider --}}
                                @include('partials.info-blocks.tabs.'. $tab->info_block_tab_type, ['tab' => $tab])
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @elseif ($block->info_block_type == 'no_tab')

        @if (!$block->info_block_tab_type || !$block->isActive())
            @continue
        @endif

        @include('partials.info-blocks.no-tabs.'. $block->info_block_tab_type, ['block' => $block])
    @endif
@endif