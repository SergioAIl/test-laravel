@extends('authors.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Изменение информации об авторе</h4>
            </div>
            <div class="pull-right">
                <form action="{{ route('authors.destroy',$author->author_id) }}" method="POST">
                    <a class="btn btn-primary" onclick="history.back()"> Вернуться назад</a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ой!</strong> Ошибка!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update',$author->author_id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ФИО автора:</strong>
                    <input type="text" name="author_name" value="{{ $author->author_name }}" class="form-control" placeholder="ФИО автора">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Об авторе:</strong>
                    <textarea class="form-control" style="height:150px" name="author_info" placeholder="Об авторе">{{ $author->author_info }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Сохранить изменения</button>
            </div>
        </div>

    </form>
@endsection