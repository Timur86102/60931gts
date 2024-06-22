@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Просмотр задачи
                </div>
                <div class="float-end">
                    <a href="{{url('/task')}}" class="btn btn-primary btn-sm"><i class="fa fa-long-arrow-left"></i> Назад</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Наименование:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $task->name }}
                    </div>
                </div>
                <div class="row">
                    <label for="note" class="col-md-4 col-form-label text-md-end text-start"><strong>Описание:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $task->note }}
                    </div>
                </div>
                <div class="row">
                    <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Статус:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $task->status }}
                    </div>
                </div>
                <div class="row">
                    <label for="user" class="col-md-4 col-form-label text-md-end text-start"><strong>Пользователь:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $task->user->name }}
                    </div>
                </div>
                <div class="row">
                    <label for="project" class="col-md-4 col-form-label text-md-end text-start"><strong>Проект:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $task->project->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection