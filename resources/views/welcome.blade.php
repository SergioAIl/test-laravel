<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-size: 12px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <div class="top-right links">
            <a href="/">Главная</a>
            <a href="{{ route('books.index') }}">Книги</a>
            <a href="{{ route('authors.index') }}">Авторы</a>
        </div>

        <div class="container" style="margin-top: 110px;">
            <table class="table table-bordered">
                <tr>
                    <th>№</th>
                    <th>Автор</th>
                    <th>Об авторе</th>
                    <th>Количество книг</th>
                    <th>Книги</th>
                </tr>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->author_info }}</td>
                        <td>{{ $author->author_books_counts }}</td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Наименование книги</th>
                                    <th>Аннотация</th>
                                    <th>Количество страниц</th>
                                </tr>
                                @foreach ($author->books as $book)
                                <tr>
                                    <th>{{$book['book_name']}}</th>
                                    <th>{{$book->book_annotation}}</th>
                                    <th>{{$book->book_volume}}</th>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
