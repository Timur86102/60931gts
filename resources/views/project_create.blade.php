@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Создание проекта
                </div>
                <div class="float-end">
                    <a href="{{url('/project')}}" class="btn btn-primary btn-sm"><i class="fa fa-long-arrow-left"></i> Назад</a>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action={{url('project')}}>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Наименование</label>
                        <input type=="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" aria-describebdy="nameHelp" value="{{ old('name') }}"/>
                        <div id="nameHelp" class="form-text">Введите наименование проекта</div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Описание</label>
                        <input type=="text" class="form-control @error('note') is-invalid @enderror"
                            id="note" name="note" aria-describebdy="noteHelp" value="{{ old('note') }}"/>
                        <div id="noteHelp" class="form-text">Введите описание проекта</div>
                        @error('note')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Статус</label>
                        <select class="form-select" id="status" name="status" aria-describebdy="statusHelp" value="{{ old('status') }}">
                            @foreach ($statuses as $status)
                                <option value="{{$status}}" @if(old('status') == $status) selected @endif>
                                    {{$status}}
                                </option>
                            @endforeach
                        </select>
                        <div id="statusHelp" class="form-text">Выберите статус проекта</div>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection