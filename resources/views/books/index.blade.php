@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Панель управления - Книги</h4>
            </div>
            <div class="pull-right" style="margin-bottom: 10px;">
                <a class="btn btn-primary" href="{{ route('books.create') }}"> Добавить книгу</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Наименование книги</th>
            <th>Аннотация</th>
            <th>Количество страниц</th>
            <th>ФИО автора</th>
            <th width="320px">Действия</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->book_name }}</td>
                <td>{{ $book->book_annotation }}</td>
                <td>{{ $book->book_volume }}</td>
                <td>{{ $book->author_name }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->book_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('books.show',$book->book_id) }}">Просмотреть</a>

                        <a class="btn btn-success" href="{{ route('books.edit',$book->book_id) }}">Изменить</a>

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $books->links() !!}

@endsection