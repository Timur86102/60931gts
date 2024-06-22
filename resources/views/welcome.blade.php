@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h1 class="h3 mt-3 text-center">Добро пожаловать в Task manager, {{Auth::user()->second_name.' '.Auth::user()->first_name.' '.Auth::user()->patronymic}}.</h1>
        <h1 class="h3 mt-3 text-center">Task manager &mdash; это веб-приложение для организации проектов и задач.</h1>
    </div>
</div>
@endsection