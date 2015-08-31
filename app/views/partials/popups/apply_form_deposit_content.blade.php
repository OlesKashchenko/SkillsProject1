<div class="popup_content" style="display: none">
    <div class="popup_content_header">
        <img src="{{asset($deposit->getImageSource('original', 'preview'))}}" alt="{{$deposit->t('title')}}"/>
    </div>

    <div class="popup_content_body">
        <h4>{{$deposit->t('title')}}</h4>
        <div class="subtitle">{{$deposit->t('short_description')}}</div>

        {{-- для теста --}}
        <ul>
            <li>
                <p>1, 3, 6, 12 мес</p>
                <span>срок депозита</span>
            </li>
            <li>
                <p>допускается</p>
                <span>пролонгация вклада</span>
            </li>
            <li>
                <p>в конце срока</p>
                <span>выплата процентов</span>
            </li>
        </ul>
        @if(array_key_exists($deposit->id, $depositOptionsGroups))
            <table>
                <thead>
                <tr>
                    <td>{{_('Периодичность виплаты')}}</td>
                    <td>{{_('Срок вклада')}}</td>
                    <td colspan="3">{{_('Годовая базовая процентная ставка')}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>UAH</td>
                    <td>USD</td>
                    <td>EUR</td>
                </tr>
                </thead>
                <tbody>
                @foreach($depositOptionsGroups[$deposit->id]['rates'] as $frequencyPayment => $groups)
                    <tr>
                        <td rowspan="{{count($groups) + 1}}">{{__($frequencyPayment) ? : __('Бессрочный')}}</td>
                        @foreach($groups as $term => $percents)
                            <tr>
                                <td>
                                    @if ($term)
                                        {{$term}} {{$depositOptionsGroups[$deposit->id]['term_type'] == 'month' ? __('мес') : __('дн')}}
                                    @else
                                        {{__('Бессрочный')}}
                                    @endif
                                <td>
                                    @if(array_key_exists('uah', $percents))
                                        {{$percents['uah']}}%
                                    @endif
                                </td>
                                <td>
                                    @if(array_key_exists('usd', $percents))
                                        {{$percents['usd']}}%
                                    @endif
                                </td>
                                <td>
                                    @if(array_key_exists('eur', $percents))
                                        {{$percents['eur']}}%
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
        <div class="field field_checkbox">
            <div class="input_holder">
                {{--commented due to task --}}
               {{-- <label class="custom_checkbox"><input type="checkbox" name="data[checkbox]"> {{_('Оформить вклад через My Alfa Bank')}}</label>
                <div class="checkbox_hint">{{_('+1% к сумме вклада')}}</div>--}}
            </div>
        </div>

        <a class="btn btn_red form_go_next_step" href="" data-text="{{_('оформить')}}"><span>{{_('оформить')}}</span></a>
    </div>
</div>
