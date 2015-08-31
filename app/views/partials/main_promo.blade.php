@if (isset($sliderItems) && count($sliderItems))
    <div class="main_promo">
        <div class="main_promo_item big">
            @if (isset($sliderItems['dynamic_first']))
                <div class="main_promo_item_inner">
                    <div class="bxslider">
                        <ul>
                            @foreach($sliderItems['dynamic_first'] as $slide)
                                <li>
                                    <a href="{{geturl($slide->link)}}"><img src="{{asset($slide->getImageSource('original', 'image'))}}" alt="{{$slide->t('title')}}"/>
                                        <div class="big_slider">
                                            @if($slide->t('title') !== "")
                                                <h3>{{$slide->t('title')}}</h3>
                                            @endif
                                            @if($slide->t('description') !== "")
                                                <p>{{$slide->t('description')}}</p>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            {{--<li><iframe src="http://player.vimeo.com/video/17914974" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></li>--}}
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        <div class="main_promo_item small">
            @if (isset($sliderItems['static_first']))
                <div class="main_promo_item_inner">
                    <a href="{{geturl($sliderItems['static_first']->link)}}"><img src="{{asset($sliderItems['static_first']->getImageSource('original', 'image'))}}" alt="{{$sliderItems['static_first']->t('title')}}"/></a>
                </div>
            @endif
        </div>
        <div class="main_promo_item small">
            @if (isset($sliderItems['static_second']))
                <div class="main_promo_item_inner">
                    <a href="{{geturl($sliderItems['static_second']->link)}}"><img src="{{asset($sliderItems['static_second']->getImageSource('original', 'image'))}}" alt="{{$sliderItems['static_second']->t('title')}}"/></a>
                </div>
            @endif
        </div>
        <div class="main_promo_item medium">
            @if (isset($sliderItems['dynamic_second']))
                <div class="main_promo_item_inner">
                    <div class="bxslider">
                        <ul>
                            @foreach($sliderItems['dynamic_second'] as $slide)
                                <li>
                                    <a href="{{geturl($slide->link)}}"><img src="{{asset($slide->getImageSource('original', 'image'))}}" alt="{{$slide->t('title')}}"/>
                                        @if(($slide->t('title')) !== "")
                                            <div class="small_slider">
                                               <p>{{$slide->t('title')}}</p>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

<script>
    setInterval(function() { sliderClick() }, 5000);

    function sliderClick() {

        $('.main_promo_item_inner .bx-next').click();

    }
</script>