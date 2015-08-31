
@if (isset($depositsCompared) && $depositsCompared)
    <div class="table_holder">
        <table>
            <thead>
            <tr>
                <td class="dtcell_1"></td>
                <td class="dtcell_2">{{__('Периодичность виплаты')}}</td>
                <td class="dtcell_3">{{__('Срок вклада')}}</td>
                <td class="dtcell_4x6" colspan="3">{{__('Годовая базовая процентная ставка')}}</td>
            </tr>
            <tr>
                <td class="dtcell_1"></td>
                <td class="dtcell_2"></td>
                <td class="dtcell_3"></td>
                <td class="dtcell_4">{{__('UAH')}}</td>
                <td class="dtcell_4">{{__('USD')}}</td>
                <td class="dtcell_6">{{__('EUR')}}</td>
            </tr>
            </thead>
            <tbody>
                @foreach($deposits as $deposit)
                    <tr>
                        <?php $depositRates = $depositsCompared[$deposit->id];?>
                        @foreach($depositRates['rates'] as $frequencyPayment => $groups)
                            <td class="dtcell_1" rowspan="{{count($groups) + 1}}">{{$deposit->t('title')}}</td>
                            <td rowspan="{{count($groups) + 1}}">{{__($frequencyPayment) ? : __('Бессрочный')}}</td>
                            @foreach($groups as $term => $percents)
                                <tr>
                                    <td>
                                        @if ($term)
                                            {{$term}} {{$depositRates['term_type'] == 'month' ? __('мес') : __('дн')}}
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
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
