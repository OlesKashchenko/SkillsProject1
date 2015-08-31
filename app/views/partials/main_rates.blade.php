@if (isset($rates) && $rates)
	<div class="main_exchange_rate js_tabs">
		<h2>{{__("Курс валют")}}</h2>
		<div class="h2_sub">{{__('на')}} {{Util::getDate(date('Y-m-d'), true)}}</div>

		<div class="main_exchange_tabs_head js_tabs_head">
			<div class="tab">{{__("Отделения")}}</div>

			@if ((Settings::get('is_show_cards_rates', 0)))
				<div class="tab">{{__("Платежные карты")}}</div>
			@endif
		</div>

		<div class="main_exchange_tabs_body js_tabs_body">
			<div class="tab">
				<table>
					<thead>
					<tr>
						<td></td>
						<td>{{__("покупка")}}</td>
						<td>{{__("продажа")}}</td>
					</tr>
					</thead>
					<tbody>
					@foreach($rates['departments'] as $rate)
						<tr>
							<td>{{$rate['currency']}}</td>
							<td>
								{{round($rate['buy'], 2)}}
                                @if(round($rate['buy_inequality'], 2) != 0)
								    <p {{round($rate['buy_inequality'], 2) < 0 ? "class='down'" : "class='up'" }}>{{round(abs($rate['buy_inequality']), 2)}}</p>
							    @else
                                    <p class="zero">0.00{{--{{round(abs($rate['buy_inequality']), 2)}}--}}</p>
                                @endif
                            </td>
							<td>
								{{round($rate['sale'], 2)}}
                                @if(round($rate['sale_inequality'], 2) != 0)
								    <p {{round($rate['sale_inequality'], 2) < 0 ? "class='down'" : "class='up'" }}>{{round(abs($rate['sale_inequality']), 2)}}</p>
                                @else
                                    <p class="zero">0.00{{--{{round(abs($rate['sale_inequality']), 2)}}--}}</p>
                                @endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{--<div class="btn btn_black"><a href="">{{__('конвертор')}}</a></div>--}}
			</div>

			@if ((Settings::get('is_show_cards_rates', 0)))
				<div class="tab">
					@foreach($rates['cards'] as $rate)
						<table>
							<thead>
								<tr>
									<td></td>
									<td>{{__("покупка")}}</td>
									<td>{{__("продажа")}}</td>
								</tr>
							</thead>
							<tbody>
							@foreach($rate as $card)
								<tr>
									<td>{{$card['currency']}}</td>
									<td>{{$card['buy'] ? round($card['buy'], 2) : '—'}}</td>
									<td>{{$card['sale'] ? round($card['sale'], 2) : '—'}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@endif
