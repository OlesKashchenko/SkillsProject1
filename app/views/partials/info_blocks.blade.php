@if (isset($blocks) && $blocks->count())
    @foreach($blocks as $block)
        @if (!$block->info_block_type || !$block->isActive())
            @continue
        @endif

        @include('partials.info_block', ['block' => $block])
    @endforeach
@endif