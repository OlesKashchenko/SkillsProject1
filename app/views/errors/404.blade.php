@extends('layouts.error')

@section('title'){{$code}}@stop

@section('main')
    <p>{{__('Неправильно набран адрес')}},</p>
    <p>{{__('или такой страницы на сайте не существует')}}</p>
@stop
