<li>
	<div class="column">
		<a href="#" class="address"
		   data-latitude="{{$officeMap['latitude']}}"
		   data-longitude="{{$officeMap['longitude']}}"
		   onclick="Map.showOffice(this);">{{__('г.')}} {{$officeMap['city']}}, {{$officeMap['address']}}</a>
	</div>
	<div class="column">
		<div class="time-table">
			<p>{{$officeMap['schedule']}}</p>

			@if ($officeMap['schedule_operations'])
				<h4>{{__('Операционная касса')}}</h4>
				<p>{{$officeMap['schedule_operations']}}</p>
				<br/>
			@endif

			@if ($officeMap['schedule_operations_post'])
				<h4>{{__('Послеоперационная касса')}}</h4>
				<p>{{$officeMap['schedule_operations_post']}}</p>
				<br/>
			@endif
		</div>
	</div>
	<div class="column">
		<table class="services">
			<tr>
				@foreach($officeMap['services'] as $service)
					<td>
						<div class="service_item type_{{rand(1, 3)}}">{{$service}}</div>
					</td>

					@if ($loop->index1 % 2 == 0)
						</tr><tr>
					@endif
				@endforeach
		</table>
	</div>
</li>
