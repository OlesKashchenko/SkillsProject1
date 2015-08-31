@if (isset($cardsCompared) && $cardsCompared->count())
    <div class="credit_card_compare_footer">
        <ul>
            @foreach($cardsCompared as $card)
                <li>
                    <div class="card_name">
                        <p>{{$card->t('title')}}</p>
                        <span>{{$card->t('label')}}</span>
                    </div>
                    <div class="card_image">
                        <img class="fake" src="{{asset($card->getImageSource('original', 'image_card_fake'))}}" alt="{{$card->t('title')}}"/>
                    </div>
                    <div class="card_remove" onclick="Card.removeFromCompare('{{$card->id}}', this, true)"></div>
                </li>
            @endforeach
        </ul>

        <a class="btn btn_yellow {{$cardsCompared->count() <= 1 ? 'disabled' : ''}}" {{$cardsCompared->count() > 1 ? 'data-popup="popup_card_compare"' : ''}} onclick="Card.formCompare();" data-text="{{__('Сравнить')}}">
            <span>{{__('Сравнить')}}</span>
        </a>
    </div>
@endif
