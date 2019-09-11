<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'book_name' => 'required|min:2|max:100|string',
            'book_annotation' => 'max:500',
            'book_volume' => 'required|integer',
            'book_author' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'book_name.required' => 'Введите название книги.',
            'book_name.string' => 'Название книги должно быть строкой.',
            'book_name.max'  => 'Название книги не должно превышать 100 символов.',
            'book_name.min'  => 'Название книги не должно быть менее 2-х символов.',
            'book_annotation.max'  => 'Аннотация к книге не должна превышать 500 символов.',
            'book_volume.required'  => 'Введите количество страниц в книге .',
            'book_volume.integer'  => 'Введите числовое значение в поле Количество страниц.',
            'book_author.required'  => 'Выберите автора книги.',
            'book_author.integer'  => 'Значение автора книги должно быть числовым.',
        ];
    }
}