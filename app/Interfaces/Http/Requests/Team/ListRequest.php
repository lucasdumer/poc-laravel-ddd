<?php

namespace App\Interfaces\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['course_id'] = $this->query('course_id');
        $data['room_id'] = $this->query('room_id');
        return $data;
    }

    public function rules()
    {
        return [];
    }
}
