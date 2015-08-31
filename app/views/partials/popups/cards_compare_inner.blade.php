@if (isset($cardsCompared) && $cardsCompared->count())
        <table>
            <tr>
                <td></td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>
                            <div class="card_name">
                                <p>{{$cardCompared->t('title')}}</p>
                                <span>{{$cardCompared->t('label')}}</span>
                            </div>
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td></td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>
                            <div class="card_image">
                                <img class="fake" src="{{asset($cardCompared->getImageSource('original', 'image_card_fake'))}}" alt="{{$cardCompared->t('title')}}"/>
                            </div>
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Технологии')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('technologies')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Плата за обслуживание')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('payment')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Снятие наличных')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('withdrawal')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Ставка по кредиту')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('loan_rate')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Процент на остаток средств')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('balance_percent')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr class="has_hover">
                <td>{{__('Программы скидок')}}</td>
                @foreach($cardsCompared as $cardCompared)
                    @if ($cardCompared->card)
                        <td>{{$cardCompared->card->t('promos')}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
@endif