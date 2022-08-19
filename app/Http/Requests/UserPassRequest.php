<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserPassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $pass = $request->current_pass;
        $currentPass = Auth::user()->password;
        
        return [
            'current_pass' => [ 'required',
                function ($attribute, $value, $fail) use ($pass, $currentPass) {
                    if (!Hash::check($pass, $currentPass)) {
                        return $fail('現在のパスワードと入力したパスワードが一致しません。');
                    }
                }
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
