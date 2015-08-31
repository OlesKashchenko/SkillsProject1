@if ($block->isActive() && $block->t('text'))
    <div class="transfer_page_prices_tabs type_4">
        <div class="max_width">
            <h2>{{$block->t('title')}}</h2>
            {{$block->t('text')}}
        </div>
    </div>
@endif