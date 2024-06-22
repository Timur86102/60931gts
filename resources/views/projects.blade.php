@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">Проекты</div>
            <div class="card-body">
                <a href="{{url('project/create')}}" class="btn btn-success btn-sm mb-3"><i class="fa fa-plus-circle fa-lg"></i> Добавить проект</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">№</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действия</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->index + 1 }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>
                                <form action="{{url('project/destroy/'.$project->id)}}">
                                    <a href="{{url('project/'.$project->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye fa-lg"></i> Просмотреть</a>
                                    <a href="{{url('project/edit/'.$project->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square fa-lg"></i> Редактировать</a>   
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы действительно хотите удалить проект?');"><i class="fa fa-trash-o fa-lg"></i> Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Записей нет!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $projects->links() }}

            </div>
        </div>
    </div>    
</div>
@endsection