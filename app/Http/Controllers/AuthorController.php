<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::latest()->paginate(5);
        return view('authors.index',compact('authors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());

        return redirect()->route('authors.index')
            ->with('success','Новый автор успешно добавлен!');
    }

    public function show(Author $author)
    {
        return view('authors.show',compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit',compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return redirect()->route('authors.index')
            ->with('success','Информация об авторе успешно обновлена!');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        Book::where('book_author', $author->author_id)->delete();
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success','Автор успешно удален из базы данных!');
    }
}
