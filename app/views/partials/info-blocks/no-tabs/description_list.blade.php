@if ($block->isActive() && $block->children->count())
    <div class="transfer_page_peculiarity">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>
            <div class="half_left">
                @if ($block->t('short_description'))
                    <p>{{$block->t('short_description')}}</p>
                @endif
            </div>
            <div class="half_right">
                <ul>
                    @foreach($block->children as $slide)
                        @if ($slide->isActive())
                            <li>{{$slide->t('title')}}​</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif