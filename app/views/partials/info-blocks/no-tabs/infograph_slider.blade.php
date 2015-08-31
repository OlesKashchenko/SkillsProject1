@if ($block->children->count() && $block->isActive())
    <div class="deposit_page_benefits">
        <h2>{{$block->t('title')}}</h2>

        <div class="slider_holder">
            <ul class="bxslider">
                <li>
                    @foreach($block->children as $slide)
                        @if ($slide->isActive())
                            <div class="deposit_page_benefits_item type_{{$loop->index1}}">
                                <p>{{$slide->t('title')}}</p>
                                {{$slide->t('short_description')}}
                            </div>
                            @if ($loop->index1 % 3 == 0)
                                </li>
                                <li>
                            @endif
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>

        @if ($block->children->count() > 3)
            <div class="drag_slider_controls">
                <div class="drag_slider_controls_dragbar"></div>
            </div>
        @endif
    </div>
@endif