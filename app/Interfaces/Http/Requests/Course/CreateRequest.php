<?php

namespace App\Interfaces\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ];
    }
}
