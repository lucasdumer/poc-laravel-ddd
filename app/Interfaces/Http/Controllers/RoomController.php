<?php

namespace App\Interfaces\Http\Controllers;

use App\Interfaces\Http\Requests\Room\CreateRequest;

class RoomController extends Controller
{
    public function create(CreateRequest $request)
    {
        try {
            return $this->success($request->all());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function list()
    {

    }
}
