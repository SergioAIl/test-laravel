@extends('books.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> Информация об авторе - {{ $book->book_name }}</h4>
            </div>
            <div class="pull-right">
                <form action="{{ route('books.destroy',$book->book_id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('books.edit',$book->book_id) }}">Изменить</a>
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
                <strong>Наменование книги:</strong>
                {{ $book->book_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Аннотация:</strong>
                {{ $book->book_annotation }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Количество страниц:</strong>
               {{ $book->book_volume }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Автор:</strong>
                {{ $book->author_name }}
            </div>
        </div>
    </div>
@endsection