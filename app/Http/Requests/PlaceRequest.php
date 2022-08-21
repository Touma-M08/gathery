<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'place.name' => ['required', 'unique:places,name'],
            'place.category_id' => ['required']
        ];
    }
}
