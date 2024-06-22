@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">Задачи</div>
            <div class="card-body">
                <a href="{{url('task/create')}}" class="btn btn-success btn-sm mb-3"><i class="fa fa-plus-circle fa-lg"></i> Добавить задачу</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">№</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Проект</th>
                        <th scope="col">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <th scope="row">{{ ($tasks->currentPage() - 1) * $tasks->perPage() + $loop->index + 1 }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->project->name }}</td>
                            <td>
                                <form action="{{url('task/destroy/'.$task->id)}}">
                                    <a href="{{url('task/'.$task->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye fa-lg"></i> Просмотреть</a>
                                    <a href="{{url('task/edit/'.$task->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square fa-lg"></i> Редактировать</a>   
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы действительно хотите удалить задачу?');"><i class="fa fa-trash-o fa-lg"></i> Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Нет записей!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $tasks->links() }}

            </div>
        </div>
    </div>    
</div>
@endsection