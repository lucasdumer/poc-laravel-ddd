<?php

namespace App\Interfaces\Http\Requests\Enrollment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'team_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
        ];
    }
}
