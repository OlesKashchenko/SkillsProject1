@if (isset($achievements) && $achievements)
	<div class="main_achievements">
		<div class="max_width">
			<h2>{{__('Альфа достижения')}}</h2>

			<div class="drag_slider">
				<div class="bxslider">
					<ul>
						@foreach ($achievements as $year => $items)
							<li data-year="{{$year}}">
								@foreach ($items as $item)
									<div class="main_achievements_item">
										<img src="{{asset($item->getImageSource('original', 'preview'))}}" alt=""/>
										<p>{{$item->t('title')}}</p>
										{{$item->t('short_description')}}
									</div>

									@if ($loop->index1 % 3 == 0)
										</li><li data-year="{{$year}}">
									@endif
								@endforeach
							</li>
						@endforeach
					</ul>
				</div>

				<div class="drag_slider_controls">
					<div class="drag_slider_controls_dragbar"></div>
				</div>
			</div>
		</div>
	</div>
@endif
