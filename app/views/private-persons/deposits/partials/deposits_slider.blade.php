@if (isset($deposits) && $deposits)
	<div class="slider_holder">
		<ul class="bxslider">

			@foreach($deposits as $deposit)
				<li>
					<div class="slider_bg"><img src="{{asset($deposit->getImageSource('original', 'preview'))}}" alt="{{$deposit->t('title')}}"/></div>

					<div class="slider_header">
						<p>{{__('Подходящие')}} {{$deposits->count()}} {{__('депозитов')}}</p>
						<div class="btn btn_transparent" onclick="Deposit.formCompare();" data-popup="popup_deposits_compare" data-text="{{_('сравнить')}}"><span>{{_('сравнить')}}</span></div>
					</div>

					<div class="slider_info">
						<div class="dtable">
							<div class="dtcell">
								<h3>{{$deposit->t('title')}}</h3>

								@if (isset($calculations[$deposit->id]) && $calculations[$deposit->id])
									@include('private-persons.deposits.partials.deposit_calculations', array('calculations' => $calculations[$deposit->id], 'depositOptionsGroups' => $depositOptionsGroups[$deposit->id]['rates']))
								@endif

								<div class="hr"></div>

								<div class="form_controls">
									@include('partials.popups.apply_form_deposit_content', ['deposit' => $deposit])

									<a class="btn btn_transparent" href="#" data-step="1" data-form-show="apply_form_deposit" data-text="{{_('Подробнее')}}">
										<span>{{_('Подробнее')}}</span>
									</a>

									<div class="submit btn btn_red" data-text="{{_('оформить')}}">
										<input type="submit" class="input_btn" value="{{_('оформить')}}" data-step="2" data-form-show="apply_form_deposit">
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			@endforeach

		</ul>
	</div>
@endif
