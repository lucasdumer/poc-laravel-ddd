<?php

namespace App\Interfaces\Http\Requests\Team;

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
            'course_id' => ['required', 'integer'],
            'room_id' => ['required', 'integer'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'shift' => ['required', 'in:morning,evening,night'],
        ];
    }
}
