<?php

namespace App\Interfaces\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'age' => ['required', 'integer'],
            'sex' => ['required', 'in:male,female'],
        ];
    }
}
