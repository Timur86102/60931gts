<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>609-31</title>
    </head>
    <body>
        <h2>Список проектов:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Наименование</td>
                <td>Описание</td>
                <td>Статус</td>
                <td>Действия</td>
            </thead>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->note}}</td>
                    <td>{{$project->status}}</td>
                    <td>
                        <a href="{{url('project/destroy/'.$project->id)}}">Удалить</a>
                        <a href="{{url('project/edit/'.$project->id)}}">Редактировать</a>
                    </td>
                </tr>
            @endforeach                        
        </table>
        {{ $projects->links() }}
    </body>
</html>