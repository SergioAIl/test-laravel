<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::leftJoin('authors', 'books.book_author', '=', 'authors.author_id')->latest('books.created_at')->paginate(5);
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request)
    {
        Book::create($request->validated());
        Author::where('author_id', $request['book_author'])
            ->increment('author_books_counts');

        return redirect()->route('books.index')
            ->with('success','Книга успешно добавлена!');
    }

    public function show($id)
    {
        $book = Book::leftJoin('authors', 'books.book_author', '=', 'authors.author_id')->where('book_id', $id)->firstOrFail();
        return view('books.show',compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit',compact('book', 'authors'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('books.index')
            ->with('success','Информация о книге успешно обновлена!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        Author::where('author_id', $book->book_author)->decrement('author_books_counts');
        $book->delete();

        return redirect()->route('books.index')
            ->with('success','Книга успешно удалена из базы данных!');
    }
}
