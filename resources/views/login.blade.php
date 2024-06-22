@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-3">
        <form method="post" action={{url('auth')}}>
            @csrf
            <h1 class="h3 mt-3 text-center">Task Manager</h1>
            <input class="form-control me-2 mb-3" type="text" placeholder="Логин" name="email" aria-label="Логин"
                    value="{{ old('email') }}"/>
            <input class="form-control me-2 mb-3" type="password" placeholder="Пароль" name="password" aria-label="Пароль"
                    value="{{ old('password') }}"/>
            <button class="btn btn-primary w-100" type="submit">Войти</button>
        </form>
    </div>
</div>
@endsection