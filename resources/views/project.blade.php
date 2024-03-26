<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>609-31</title>
    </head>
    <body>
        <h2>{{ $project ? "Список задач проекта ".$project->name : "Неверный ID проекта" }}</h2>
        @if($project)
        <table border="1">
            <thead>
                <td>id</td>
                <td>Наименование</td>
                <td>Описание</td>
                <td>Статус</td>
            </thead>
            @foreach ($project->tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->note}}</td>
                    <td>{{$task->status}}</td>
                </tr>
            @endforeach                        
        </table>
        @endif
    </body>
</html>