<!DOCTYPE html>
<html>
    <head>
        <title>Панель управления</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <style>
            body, .btn {
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
        </style>

        <div class="top-right links">
            <a href="/">Главная</a>
            <a href="{{ route('books.index') }}">Книги</a>
            <a href="{{ route('authors.index') }}">Авторы</a>
        </div>

        <div class="container" style="margin-top: 110px;">
            @yield('content')
        </div>
    </body>

    <script>
        setTimeout(function () {
            Document.getElementsByClassName("alert").remove();
        }, 2000)
    </script>
</html>