@extends('authors.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Добавление нового автора</h4>
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

    <form action="{{ route('authors.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ФИО автора:</strong>
                    <input type="text" name="author_name" class="form-control" placeholder="ФИО автора">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Об авторе:</strong>
                    <textarea class="form-control" style="height:150px" name="author_info" placeholder="Об авторе"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Добавить автора</button>
            </div>
        </div>

    </form>
@endsection