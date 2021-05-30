<?php

namespace App\Interfaces\Http\Requests\Enrollment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['id'] = $this->route('id');
        return $data;
    }

    public function rules()
    {
        return [
            'id' => ['required', 'integer'],
            'team_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
        ];
    }
}
