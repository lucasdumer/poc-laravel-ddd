<?php

namespace App\Interfaces\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'course_id' => ['required', 'integer'],
            'room_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'shift' => ['required', 'in:morning,evening,night'],
        ];
    }
}
