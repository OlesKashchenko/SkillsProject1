@extends('backend.layouts.default')

@section('headline')
    <div>
        <h1>Загрузка отделений</h1>
    </div>
@stop

@section('main')
    <div id="content">
        <form id="offices-import" method="post">
            <input type="file" id="file" name="file">
            <button onclick="Offices.importOffices(); return false;">Загрузить отделения</button>
        </form>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/offices.js')}}"></script>
@stop
