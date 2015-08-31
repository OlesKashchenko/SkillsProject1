@if ($row && $row['currency'])

<div>

    {{--<input type="hidden" id="currency" value="{{$row->currency}}">--}}
	<button  onclick="jQuery.ajax({type:'POST',url: '/rates/refresh',data: {id: '{{$row['id']}}',currency: '{{$row['currency']}}'},dataType: 'json',success:function(response){if(response.status){window.location.reload();}}}); /*return false;*/" class="btn btn-default btn-sm" rel="tooltip" title="" data-placement="bottom" data-original-title="Update">
            Обновить
    </button>
</div>
@endif