@if (isset($officeMap) && $officeMap)
	<div class="test_marker none" data-id="{{$officeMap['id']}}">
		<div class="map_marker">
			<h3>
				<?php

				$preparedTypes = array();
				if (in_array('office', $officeMap['types'])) {
					$preparedTypes[] = __('Отделение');
				}
				if (in_array('mini', $officeMap['types'])) {
					$preparedTypes[] = __('Миниотделение');
				}
				if (in_array('atm', $officeMap['types'])) {
					$preparedTypes[] = __('Банкомат');
				}

				$preparedTypes = implode(', ', $preparedTypes);

				?>

				{{$preparedTypes}}
			</h3>

			<p>{{__('г.')}} {{$officeMap['city']}}, {{$officeMap['address']}}</p>

			<div class="hr"></div>

			@if ($officeMap['phones'])
				<div class="upcase">{{__('Телефоны')}}</div>
				@foreach ($officeMap['phones'] as $phone)
					<p>{{$phone}}</p>
				@endforeach
				<br/>
			@endif

			@if ($officeMap['schedule'])
				<div class="upcase">{{__('Время работы')}}</div>
				<p>{{$officeMap['schedule']}}</p>
				<br/>

				{{--
				<p>09:00 — 18:00 <span class="upcase">пн – пт</span></p>
				<p>10:00 — 14:00 <span class="upcase">сб, вс</span></p>
				--}}
			@endif

			@if ($officeMap['schedule_operations'])
				<div class="upcase">{{__('Операционная касса')}}</div>
				<p>{{$officeMap['schedule_operations']}}</p>
				<br/>

				{{--
				<p>09:00 — 15:00 <span class="upcase">пн – пт</span></p>
				<p>Выходной <span class="upcase">сб, вс</span></p>
				--}}
			@endif

			@if ($officeMap['schedule_operations_post'])
				<div class="upcase">{{__('Послеоперационная касса')}}</div>
				<p>{{$officeMap['schedule_operations_post']}}</p>

				{{--
				<p>09:00 — 15:00 <span class="upcase">пн – пт</span></p>
				<p>Выходной <span class="upcase">сб, вс</span></p>
				--}}
			@endif

			<div class="hr"></div>

			<div class="upcase">{{__('директор')}}</div>
			<p>{{$officeMap['director']}}</p>

			<div class="hr"></div>

			@if ($officeMap['services'])
				<div class="upcase">{{__('услуги')}}</div>
				<div class="services_holder">
					@foreach($officeMap['services'] as $service)
						<div class="service hint_holder type_{{rand(1, 3)}}">
							<div class="hint">{{$service}}</div>
						</div>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@endif
