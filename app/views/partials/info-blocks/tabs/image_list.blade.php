{{--@if ($tab->children->count())--}}
    <div class="tab half_right_only">
        <div class="tab_inner">
            <div class="img_holder">
                <img src="{{asset($tab->getImageSource('original', 'image_background'))}}" alt="{{$tab->t('title')}}"/>
            </div>

            @if ($tab->t('short_description'))
                <p class="size_bigger">{{$tab->t('short_description')}}</p>
            @endif

            @if ($tab->children->count())
                <ul class="order_type_brick">
                    @foreach($tab->children as $slide)
                        @if (!$slide->isActive())
                            @continue
                        @endif

                        <li class="li_{{$loop->index1}}">{{$slide->t('title')}}</li>
                    @endforeach
                </ul>
            @endif

            <div class="clear"></div>
        </div>
    </div>
{{--@endif--}}
