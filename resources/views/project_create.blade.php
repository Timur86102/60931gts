<!DOCTYPE html>
<html land="en">
    <head>
        <meta charset="UTF-8">
        <title>609-31</title>
        <style> .is-invalid { color: red; } </style>
    </head>
    <body>
        <h2>Добавление проекта</h2>
        <form method="post" action={{url('project')}}>
            @csrf
            <label>Наименование</label>
            <input type=="text" name="name" value="{{ old('name') }}"/>
            @error('name')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        <br><br>
            <label>Описание</label>
            <input type=="text" name="note" value="{{ old('note') }}"/>
            @error('note')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        <br><br>
            <label>Статус</label>
            <select name="status" value="{{ old('status') }}">
                @foreach ($statuses as $status)
                    <option value="{{$status}}" @if(old('status') == $status) selected @endif>
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