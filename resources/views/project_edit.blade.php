<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>609-31</title>
        <style> .is-invalid { color: red; } </style>
    </head>
    <body>
        <h2>Редактирование проекта</h2>
        <form method="post" action={{url('project/update/'.$project->id)}}>
            @csrf
            <label>Наименование</label>
            <input type=="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$project->name}} @endif"/>
            @error('name')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        <br><br>
            <label>Описание</label>
            <input type=="text" name="note" value="@if (old('note')) {{old('note')}} @else {{$project->note}} @endif"/>
            @error('note')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        <br><br>
            <label>Статус</label>
            <select name="status" value="{{ old('status') }}">
                @foreach ($statuses as $status)
                    <option value="{{$status}}" 
                        @if(old('status'))
                            @if(old('status') == $status) selected @endif
                        @else
                            @if($project->status == $status) selected @endif
                        @endif> 
                            {{$status}}
                    </option>
                @endforeach
            </select>
            @error('status')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        <br><br>
            <input type="submit"/>
        </form>
    </body>
</html>