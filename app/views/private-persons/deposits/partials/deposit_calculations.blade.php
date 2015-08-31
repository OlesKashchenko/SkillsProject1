{{--{{dr($depositOptionsGroups)}}--}}
@if (isset($calculations) && $calculations)
	<div class="deposit-result" data-id-deposit="{{$deposit->id}}">
		<p>{{isset($calculations['sum']) ? round($calculations['amount'] + $calculations['sum']) .' '. __($calculations['currency']) : ''}}</p>
		<p class="subtitle">{{__('вы получите')}}</p>
	</div>

	<div class="hr"></div>

	<table>
		<tbody>

		@if (isset($calculations['installment']))
			<tr>
				<td>{{__('Пополнения за')}} {{$calculations['term']}} {{__('мес')}}</td>
				<td>{{round($calculations['installment'])}} {{__($calculations['currency'])}}</td>
			</tr>
		@endif

		@if (isset($calculations['sum']))
			<tr>
				<td>{{__('Начисленные проценты')}}</td>
				<td>{{round($calculations['sum'])}} {{__($calculations['currency'])}}</td>
			</tr>
		@endif

		@if (isset($calculations['bonus']))
			<tr>
				<td>{{__('Бонусы')}}</td>
				<td>{{round($calculations['bonus'])}} {{__($calculations['currency'])}}</td>
			</tr>
		@endif

		@if (isset($calculations['percent']))
			<tr>
				<td>{{__('Процентная ставка')}}</td>
                @if(isset($depositOptionsGroups[$calculations['paymentType']]) && $depositOptionsGroups[$calculations['paymentType']])
                    @if(isset($depositOptionsGroups[$calculations['paymentType']][$calculations['term']]) && $depositOptionsGroups[$calculations['paymentType']][$calculations['term']])
                        @if(isset($depositOptionsGroups[$calculations['paymentType']][$calculations['term']][$calculations['currency']]) && $depositOptionsGroups[$calculations['paymentType']][$calculations['term']][$calculations['currency']])
				            <td>{{$depositOptionsGroups[$calculations['paymentType']][$calculations['term']][$calculations['currency']]}}{{--{{$calculations['percent']}}--}}%</td>
                        @else
                            <td>Нет такого... {{--{{$calculations['percent']}}--}}%</td>
                        @endif
                    @else
                        <td>Нет такого... {{--{{$calculations['percent']}}--}}%</td>
                    @endif
			    @else
                    <td>Нет такого... {{--{{$calculations['percent']}}--}}%</td>
                @endif
            </tr>
		@endif

		</tbody>
	</table>
@endif
