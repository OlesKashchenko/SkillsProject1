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