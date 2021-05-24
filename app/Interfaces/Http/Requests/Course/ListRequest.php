<?php

namespace App\Interfaces\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['name'] = $this->query('name');
        $data['description'] = $this->query('description');
        return $data;
    }

    public function rules()
    {
        return [];
    }
}
