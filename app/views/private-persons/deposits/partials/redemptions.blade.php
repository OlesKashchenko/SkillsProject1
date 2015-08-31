@if (isset($maxPercents) && $maxPercents)
	<div class="field field_redemption">
		<label>{{__('Выплаты процентов')}}</label>
		<div class="input_holder">
			<div class="radio_button {{isset($maxPercents['max_percent_type']) && $maxPercents['max_percent_type'] == 'end' ? 'checked' : ''}} {{!isset($maxPercents['end']) ? 'none_checked' : ''}}" >
				<p>{{isset($maxPercents['end']) ? $maxPercents['end'] : 0}}%</p>
				<span>{{__('в конце срока')}}</span>
				<input type="radio"
				       value="0"
				       name="interest_payment"
				       data-percent="{{isset($maxPercents['end']) ? $maxPercents['end'] : 0}}"
				       data-type="end">
				@if (!isset($maxPercents['end']))
					<i class="hint">{{__('Варианты отсутствуют')}}</i>
				@endif
			</div>
			<div class="radio_button {{isset($maxPercents['max_percent_type']) && $maxPercents['max_percent_type'] == 'monthly' ? 'checked' : ''}} {{!isset($maxPercents['monthly']) ? 'none_checked' : ''}}">
				<p>{{isset($maxPercents['monthly']) ? $maxPercents['monthly'] : 0}}%</p>
				<span>{{__('ежемесячно')}}</span>
				<input type="radio"
				       value="1"
				       name="interest_payment"
				       data-percent="{{isset($maxPercents['monthly']) ? $maxPercents['monthly'] : 0}}"
				       data-type="monthly">
				@if (!isset($maxPercents['monthly']))
					<i class="hint">{{__('Варианты отсутствуют')}}</i>
				@endif
			</div>
			<div class="radio_button {{isset($maxPercents['max_percent_type']) && $maxPercents['max_percent_type'] == 'capitalize' ? 'checked' : ''}} {{!isset($maxPercents['capitalize']) ? 'none_checked' : ''}}">
				<p>{{isset($maxPercents['capitalize']) ? $maxPercents['capitalize'] : 0}}%</p>
				<span>{{__('капитализируя')}}</span>
				<input type="radio"
				       value="2"
				       name="interest_payment"
				       data-percent="{{isset($maxPercents['capitalize']) ? $maxPercents['capitalize'] : 0}}"
				       data-type="capitalize">
				@if (!isset($maxPercents['capitalize']))
					<i class="hint">{{__('Варианты отсутствуют')}}</i>
				@endif
			</div>
		</div>
	</div>
@endif
