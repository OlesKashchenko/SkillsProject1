<div class="tab">
	<div class="tab_inner">
		<form class="form" action="">
			@if (isset($programs) && $programs->count())
				<div class="field field_brand">
					<label>{{__('Бонусная программа')}}</label>
					<div class="input_holder">
						<select id="select_card_partner" class="custom_select_icons" name="data[subject]">
							<option value="0">{{__('Выберите программу')}}</option>
							@foreach($programs as $program)
								<option value="{{$program->id}}" data-imagesrc="{{asset($program->getImageSource('original', 'image'))}}">{{$program->t('title')}}</option>
							@endforeach
						</select>
					</div>
				</div>
			@endif
			<div class="field field_checkbox field_secure">
				<div class="input_holder">
					<label class="custom_checkbox">
						<input type="checkbox" name="is_pay_pass"> PayPass
					</label>
				</div>
			</div>
			<div class="field field_checkbox field_secure">
				<div class="input_holder">
					<label class="custom_checkbox">
						<input type="checkbox" name="is_chip"> {{__('Защита чипом')}}
					</label>
				</div>
			</div>
			<div class="clear"></div>
		</form>

		@if (isset($cards) && $cards->count())
			<ul class="brand_list">
				@foreach($cards as $card)

					<?php
						$programsIds = array();
						if ($card->cardsPrograms->count()) {
							foreach ($card->cardsPrograms as $program) {
								$programsIds[] = $program->id;
							}
						}
					?>

					<li data-category="0,{{implode(',', $programsIds)}}" data-is_pay_pass="{{$card->getIsPayPass()}}" data-is_chip="{{$card->getIsChip()}}">
						<div class="card_name">{{$card->t('title')}}</div>
						<div class="card_type">{{$card->t('label')}}</div>
						<div class="card_img">
							<img class="back" src="{{asset($card->getImageSource('original', 'image_card_fake'))}}" alt="{{$card->t('title')}}"/>
							<img class="front" src="{{asset($card->getImageSource('original', 'image_card_front'))}}" alt="{{$card->t('title')}}"/>
						</div>
						<div class="card_info">
							<div class="dtable">
								<div class="dtcell">{{$card->t('description')}}</div>
							</div>
						</div>
						<div class="btn btn_red"><span><a href="{{$card->link_main}}">{{__('заказать бесплатно')}}</a></span></div>
					</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
