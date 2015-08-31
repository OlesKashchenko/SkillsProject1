@if ($block->isActive() && $block->children->count())
    <div class="credit_page_info_block">
        <div class="max_width">
            @foreach($block->children as $item)
                @if ($item->isActive())
                    <p>{{$item->t('title')}}</p>
                @endif
            @endforeach
        </div>
    </div>
@endif