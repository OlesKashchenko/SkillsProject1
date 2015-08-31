<div class="form_infobar" id="consumer_calculator_table">
	<div class="infobar_part_1">
		<div class="title">{{__('стоимость товара')}}</div>
		<div class="descr">{{isset($result['sum']) && $result['sum'] ? $result['sum'] : ''}} {{__('грн')}}</div>
	</div>
	<div class="infobar_part_2">
		<div class="title">{{__('на срок')}}</div>
		<div class="descr">{{isset($result['term']) && $result['term'] ? $result['term'] : ''}} {{__('мес')}}</div>
	</div>
	<div class="infobar_part_3">
		<div class="title">{{__('ежемесячный платеж')}}</div>
		<div class="descr">{{isset($result['payment']) && $result['payment'] ? $result['payment'] : ''}} {{__('грн')}}</div>
	</div>
</div>
