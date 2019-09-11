@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Изменение информации о книге</h4>
            </div>
            <div class="pull-right">
                <form action="{{ route('books.destroy',$book->book_id) }}" method="POST">
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

    <form action="{{ route('books.update',$book->book_id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Наменование книги:</strong>
                    <input type="text" name="book_name" class="form-control" value="{{ $book->book_name }}" placeholder="Наменование книги">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Аннотация:</strong>
                    <textarea class="form-control" style="height:150px" name="book_annotation" placeholder="Аннотация">{{ $book->book_annotation }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Количество страниц:</strong>
                    <input type="text" class="form-control" name="book_volume" value="{{ $book->book_volume }}" placeholder="Количество страниц">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Автор:</strong>
                    <select name="book_author" placeholder="Автор">
                        @foreach ($authors as $author)
                            <option value="{{ $author->author_id }}" {{ ( $author->author_id == $book->book_author) ? 'selected' : '' }}> {{ $author->author_name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Сохранить изменения</button>
            </div>
        </div>

    </form>
@endsection