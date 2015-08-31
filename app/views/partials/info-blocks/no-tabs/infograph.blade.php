@if ($block->children->count() && $block->isActive())
    <div class="credit_card_bonus_program">
        <h2>{{$block->t('title')}}</h2>
        <ul>
            @foreach($block->children as $child)
                @if ($child->isActive())
                    <li class="type_{{$loop->index1}}">
                        <div class="dtable">
                            <div class="dtcell">{{$child->t('title')}}</div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif