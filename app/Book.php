<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_name', 'book_annotation', 'book_volume', 'book_author'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $primaryKey = 'book_id';
}
