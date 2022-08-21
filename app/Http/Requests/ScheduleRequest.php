<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schedule.place_id' => ['required'],
            'schedule.date' => ['required'],
            
        ];
    }
}
