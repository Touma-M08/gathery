<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user.name' => ['required', 'string', 'max:10'],
            'user.age' => ['required'],
            'user.sex' => ['required'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user.file' => ['image'],
        ];
    }
}
