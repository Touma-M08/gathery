<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'review.title' => ['required', 'string', 'max:20'],
            'review.comment' => ['max:150'],
        ];
    }
}
