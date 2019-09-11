<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;

class RestController extends Controller
{
    public function index()
    {
        return Book::leftJoin('authors', 'books.book_author', '=', 'authors.author_id')->get();
    }

    public function show(Book $book)
    {
        return Book::findOrFail($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return response()->json($book);
    }

    public function destroy(BookRequest $request, $book)
    {
        $book = Book::findOrFail($book);
        Author::where('author_id', $book->book_author)->decrement('author_books_counts');
        if($book->delete()) return response(null, 204);
    }
}