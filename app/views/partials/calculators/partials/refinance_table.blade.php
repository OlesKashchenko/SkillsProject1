<table id="refinance_calculator_table">
	<tr>
		<td>{{__('Срок кредита')}}</td>
		@if (isset($result) && $result)
			@foreach ($result as $termData)
				@if ($termData['term'])
					<td>{{$termData['term']}}</td>
				@else
					<td><span></span></td>
				@endif
			@endforeach
		@else
			@for ($i = 0; $i < 6; $i++)
				<td><span></span></td>
			@endfor
		@endif
	</tr>
	<tr>
		<td>{{__('Сумма рефинансирования')}}</td>
		@if (isset($result) && $result)
			@foreach ($result as $termData)
				@if ($termData['sum'])
					<td>{{$termData['sum']}}</td>
				@else
					<td><span></span></td>
				@endif
			@endforeach
		@else
			@for ($i = 0; $i < 6; $i++)
				<td><span></span></td>
			@endfor
		@endif
	</tr>
	<tr>
		<td>{{__('Ежемесячный платеж')}}</td>
		@if (isset($result) && $result)
			@foreach ($result as $termData)
				@if ($termData['payment'])
					<td>{{$termData['payment']}}</td>
				@else
					<td><span></span></td>
				@endif
			@endforeach
		@else
			@for ($i = 0; $i < 6; $i++)
				<td><span></span></td>
			@endfor
		@endif
	</tr>
</table>
