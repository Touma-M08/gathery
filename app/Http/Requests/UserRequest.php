<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request, User $user)
    {
        $email = $request['user.email'];
        $unique = $user->where('id', '!=', Auth::user()->id)->where('email', '=', $email)->get();
    
        return [
            'user.name' => ['required', 'string', 'max:10'],
            'user.age' => ['required'],
            'user.sex' => ['required'],
            'user.email' => ['required', 'string', 'email', 
                function ($attribute, $value, $fail) use ($unique) {
                    if (!($unique->isEmpty())) {
                        return $fail('このメールアドレスはすでに登録されています');
                    }
                }, 
                'max:255'
            ],
            'image' => ['image'],
        ];
    }
}
