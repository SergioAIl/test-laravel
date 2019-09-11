<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'author_name', 'author_info'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $primaryKey = 'author_id';

    public static function getAuthorsBooks() {
        $authors =  static::all();
        foreach ($authors as $author) {
            $books = Book::where('book_author', $author->author_id)->get();
            $author['books'] = $books;
        }
        return $authors;
    }
}
