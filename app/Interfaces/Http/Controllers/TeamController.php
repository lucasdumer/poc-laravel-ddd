<?php

namespace App\Interfaces\Http\Controllers;

use App\Interfaces\Http\Requests\Team\CreateRequest;

class TeamController
{
    public function create(CreateRequest $request)
    {
        dd($request->name);
    }
}
