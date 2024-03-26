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
            </thead>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>
                </tr>
            @endforeach                        
        </table>
    </body>
</html>