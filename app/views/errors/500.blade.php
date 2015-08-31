@extends('layouts.error')

@section('title'){{$code}}@stop

@section('main')
    <p>{{__('На сервере произошла непредвиденная ошибка')}},</p>
    <p>{{__('будет исправлена в ближайшее время')}}</p>
@stop
