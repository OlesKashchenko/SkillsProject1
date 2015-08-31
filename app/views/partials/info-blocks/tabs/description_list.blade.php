@if ($tab->children->count())
    <div class="tab">
        <div class="tab_inner">
            <div class="tab_half left">
                @if ($tab->t('short_description'))
                    <p class="size_bigger">{{$tab->t('short_description')}}</p>
                @endif
            </div>

            @if ($tab->children->count())
                <div class="tab_half right">
                    <ul>
                        @foreach($tab->children as $slide)
                            @if ($slide->isActive())
                                <li>{{$slide->t('title')}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="clear"></div>
        </div>
    </div>
@endif
