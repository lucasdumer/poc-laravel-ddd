<?php

namespace App\Interfaces\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'number' => ['required', 'integer'],
            'numberMaximumPeople' => ['required', 'integer'],
        ];
    }
}
