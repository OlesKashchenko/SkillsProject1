<div class="popup popup_side none popup_packet_form" id="popup_apply_form_business">
	<div class="popup_content">
		<h3>{{__('Оформить заявку')}}</h3>

		<form class="form form_packet_form" action="" method="post" id="apply_form_business">
			<input type="hidden" id="id_catalog" name="id_catalog" value="{{isset($page) ? $page->id : ''}}">

			<?php

			$applyFormType = '';
			$types = Config::get('orders.types');
			foreach ($types as $typeName => $typeProducts) {
				if (isset($page) && in_array($page->id, $typeProducts)) {
					$applyFormType = $typeName;
					break;
				}
			}

			?>

			<input type="hidden" name="apply_form_type" value="{{$applyFormType}}">

			<div class="fields_group">
				<div class="field">
					<label>{{__('ФИО')}}</label>
					<div class="input_holder">
						<input type="text" name="last_name" maxlength="32">
						<div class="placeholder">{{__('Фамилия')}}</div>
					</div>
				</div>
				<div class="field field_no_label">
					<div class="input_holder">
						<input type="text" name="first_name" maxlength="32">
						<div class="placeholder">{{__('Имя')}}</div>
					</div>
				</div>
				<div class="field field_no_label">
					<div class="input_holder">
						<input type="text" name="patronymic_name" maxlength="32">
						<div class="placeholder">{{__('Отчество')}}</div>
					</div>
				</div>
			</div>

			<div class="field field_phone">
				<label>{{__('Номер мобильного телефона')}}</label>
				<div class="input_holder select_holder">
					<select class="custom_select" name="phone_code">
						@foreach($operatorCodes as $code)
							<option value="+38 {{$code}}">+38 {{$code}}</option>
						@endforeach
					</select>
				</div>
				<div class="input_holder">
					<input type="text" name="phone_number" maxlength="7">
				</div>
			</div>

			<div class="field">
				<label>{{__('Эл. адрес')}}</label>
				<div class="input_holder">
					<input type="text" name="email">
				</div>
			</div>

			{{--
			<div class="field">
				<label>{{__('Вид занятости')}}</label>
				<div class="input_holder select_holder">
					<select class="custom_select" name="occupation">
						@foreach($occupations as $occupation)
							<option value="{{$occupation->id}}">{{$occupation->t('title')}}</option>
						@endforeach
					</select>
				</div>
			</div>
			--}}

			<div class="field">
				<label>{{__('Область')}}</label>
				<div class="input_holder select_holder">
					<select class="custom_select" name="region" onchange="ApplyForm.filterCitiesByRegion(this);">
						@foreach($regions as $region)
							<option value="{{$region->id}}">{{$region->t('title')}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="field">
				<label>{{__('Город')}}</label>
				<div class="input_holder select_holder">
					@include('partials.popups.partials.select_city')
				</div>
			</div>

			<div class="field field_checkbox">
				<div class="input_holder">
					<label class="custom_checkbox"><input type="checkbox" name="confirm"> {{__('Я согласен на')}}</label> <a href="" data-popup="popup_apply_form_text">{{__('обработку моих данных')}}</a>
				</div>
			</div>

			<div class="field">
				<label>{{__('Код партнера')}}</label>
				<div class="input_holder">
					<input type="text" name="partner_code">
				</div>
			</div>

			<div class="submit btn btn_big btn_red">
				<input type="submit" class="input_btn" value="{{__('отправить')}}" onclick="jQuery('#apply_form_business').submit(); return false;">
			</div>
		</form>
	</div>
	<span class="close"></span>
</div>
