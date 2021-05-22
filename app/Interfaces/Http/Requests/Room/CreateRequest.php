<?php

namespace App\Interfaces\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'numberMaximumPeople' => ['required', 'integer'],
        ];
    }
}
