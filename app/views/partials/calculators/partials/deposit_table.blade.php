<?php $calculations = array_values($calculations)[0]; ?>
@if (isset($calculations) && $calculations)
	<div class="form_infobar" id="deposit_calculator_table">

		@if (isset($calculations['amount']))
			<div class="infobar_part_1">
				<div class="title">{{__('сумма вклада')}}</div>
				<div class="descr">{{$calculations['amount']}} {{__($calculations['currency'])}}</div>
			</div>
		@endif

		@if (isset($calculations['term']))
			<div class="infobar_part_2">
				<div class="title">{{__('на срок')}}</div>
				<div class="descr">{{$calculations['term']}} {{__('мес')}}</div>
			</div>
		@endif

		@if (isset($calculations['sum']))
			<div class="infobar_part_3">
				<div class="title">{{__($calculations['paymentType'])}}</div>
				<div class="descr">{{round($calculations['amount'] + $calculations['sum'])}} {{__($calculations['currency'])}}</div>
			</div>
		@endif
	</div>
@endif
