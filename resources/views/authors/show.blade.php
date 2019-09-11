@extends('authors.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> Информация об авторе - {{ $author->author_name }}</h4>
            </div>
            <div class="pull-right">
                <form action="{{ route('authors.destroy',$author->author_id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('authors.edit',$author->author_id) }}">Изменить</a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    <a class="btn btn-primary" onclick="history.back()"> Вернуться назад</a>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ФИО автора:</strong>
                {{ $author->author_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Об авторе:</strong>
                {{ $author->author_info }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Количество книг:</strong>
                {{ $author->author_books_counts }}
            </div>
        </div>
    </div>
@endsection