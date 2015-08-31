@if (isset($cities) && $cities->count())
    <select class="custom_select" name="city">
        @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->t('title')}}</option>
        @endforeach
    </select>
@else
    <select class="custom_select" name="city" disabled>
        <option value="0">.....</option>
    </select>
@endif
