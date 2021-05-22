<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\RoomCreateCommand;
use App\Application\Services\RoomService;
use App\Interfaces\Http\Requests\Room\CreateRequest;
use App\Interfaces\Http\Requests\Room\FindRequest;

class RoomController extends Controller
{
    public function __construct(
        private RoomService $roomService
    ) {}

    public function create(CreateRequest $request)
    {
        try {
            $roomCreateCommand = new RoomCreateCommand(
                $request->name,
                $request->numberMaximumPeople
            );
            return $this->success($this->roomService->create($roomCreateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(FindRequest $request)
    {
        try {
            return $this->success($this->roomService->find($request->id)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
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
