<form class="form form_calculator_1" action="" method="post" id="calculator_consumer">
	<div class="field">
		<label>{{__('Город')}}</label>
		<div class="input_holder" style="padding: 0;">
			<select class="custom_select" name="city_select">
				@foreach($cities as $city)
					<option value="{{$city->id}}">{{$city->t('title')}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="field field_store">
		<label>{{__('Магазин')}}</label>
		<div class="input_holder">
			<select class="custom_select" name="shop_select">
				@foreach($shops as $shop)
					<option value="{{$shop->id}}">{{$shop->t('title')}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="field field_product">
		<label>{{__('Желаемый товар')}}</label>
		<div class="input_holder">
			<select class="custom_select" name="product_type_select">
				@foreach($products as $product)
					<option value="{{$product->id}}">{{$product->t('title')}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="clear"></div>

	<div class="field field_cost">
		<label>{{__('Стоимость товара')}} <span>UAH</span></label>
		<div class="input_holder">
			<input type="text"
			       name="product_price"
			       value="{{Collector::get('calculatorsSettings')['consumer']['product_price_min']}}">
			<div class="input_helper_draggable"
			     data-min="{{Collector::get('calculatorsSettings')['consumer']['product_price_min']}}"
			     data-max="{{Collector::get('calculatorsSettings')['consumer']['product_price_max']}}">
			</div>
		</div>
	</div>
	<div class="field field_duration">
		<label>{{__('На срок')}} <span>{{__('мес.')}}</span></label>
		<div class="input_holder">
			<input type="text"
			       name="credit_term"
			       value="{{Collector::get('calculatorsSettings')['consumer']['credit_term_min']}}">
			<div class="input_helper_draggable"
			     data-min="{{Collector::get('calculatorsSettings')['consumer']['credit_term_min']}}"
			     data-max="{{Collector::get('calculatorsSettings')['consumer']['credit_term_max']}}">
			</div>
		</div>
	</div>
	<div class="clear"></div>

	@include('partials.calculators.partials.consumer_table')

	<div class="field field_assurance">
		<label class="label_name">{{__('Застраховать кредит')}}</label>
		<label class="custom_checkbox"><input type="checkbox" name="is_insurance_loss_job"> {{__('от временной потери работы')}}</label>
		<label class="custom_checkbox"><input type="checkbox" name="is_insurance_accident"> {{__('от несчастного случая')}}</label>
	</div>

	<div class="tac">
		<div class="submit btn btn_big btn_red">
			<input type="submit" class="input_btn" value="{{__('оформить заявку')}}" onclick="return false;" data-popup="popup_apply_form">
		</div>
	</div>
</form>
