@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Добавление новой книги</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" onclick="history.back()"> Вернуться назад</a>
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

    <form action="{{ route('books.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Наменование книги:</strong>
                    <input type="text" name="book_name" class="form-control" placeholder="Наменование книги">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Аннотация:</strong>
                    <textarea class="form-control" style="height:150px" name="book_annotation" placeholder="Аннотация"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Количество страниц:</strong>
                    <input type="text" class="form-control" name="book_volume" placeholder="Количество страниц">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Автор:</strong>
                    <select name="book_author" placeholder="Автор">
                        @foreach ($authors as $author)
                            <option value="{{ $author->author_id }}"> {{ $author->author_name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Добавить книгу</button>
            </div>
        </div>

    </form>
@endsection