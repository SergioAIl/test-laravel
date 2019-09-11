@extends('authors.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Панель управления - Авторы</h4>
            </div>
            <div class="pull-right" style="margin-bottom: 10px;">
                <a class="btn btn-primary" href="{{ route('authors.create') }}"> Добавить автора</a>
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
            <th>ФИО автора</th>
            <th>Об авторе</th>
            <th>Количество книг</th>
            <th width="320px">Действия</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $author->author_name }}</td>
                <td>{{ $author->author_info }}</td>
                <td>{{ $author->author_books_counts }}</td>
                <td>
                    <form action="{{ route('authors.destroy',$author->author_id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('authors.show',$author->author_id) }}">Просмотреть</a>

                        <a class="btn btn-success" href="{{ route('authors.edit',$author->author_id) }}">Изменить</a>

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $authors->links() !!}

@endsection