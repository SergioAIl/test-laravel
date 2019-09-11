<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'author_name' => 'required|string|min:2|max:50',
            'author_info' => 'max:500'
        ];
    }

    public function messages()
    {
        return [
            'author_name.required' => 'Введите ФИО автора.',
            'author_name.max'  => 'ФИО автора не должно превышать 50 символов.',
            'author_name.min'  => 'ФИО автора не должно быть меньше 2 символов.',
            'author_info.max'  => 'Информация об авторе не должна превышать 500 символов.',
        ];
    }

}
