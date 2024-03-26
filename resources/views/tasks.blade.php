<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>609-31</title>
    </head>
    <body>
        <h2>Список задач:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Наименование</td>
                <td>Описание</td>
                <td>Статус</td>
                <td>Проект</td>
            </thead>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->note}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$task->project->name}}</td>
                </tr>
            @endforeach                        
        </table>
    </body>
</html>