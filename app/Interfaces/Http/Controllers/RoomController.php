<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\RoomCreateCommand;
use App\Application\Commands\RoomUpdateCommand;
use App\Application\Services\RoomService;
use App\Interfaces\Http\Requests\Room\CreateRequest;
use App\Interfaces\Http\Requests\DeleteRequest;
use App\Interfaces\Http\Requests\FindRequest;
use App\Interfaces\Http\Requests\Room\ListRequest;
use App\Interfaces\Http\Requests\Room\UpdateRequest;

class RoomController extends Controller
{
    public function __construct(
        private RoomService $roomService
    ) {}

    public function create(CreateRequest $request)
    {
        $roomCreateCommand = new RoomCreateCommand(
            $request->name,
            $request->numberMaximumPeople
        );
        return $this->success($this->roomService->create($roomCreateCommand)->toArray());
    }

    public function find(FindRequest $request)
    {
        return $this->success($this->roomService->find($request->id)->toArray());
    }

    public function update(UpdateRequest $request)
    {
        $roomUpdateCommand = new RoomUpdateCommand(
            $request->id,
            $request->name
        );
        return $this->success($this->roomService->update($roomUpdateCommand)->toArray());
    }

    public function delete(DeleteRequest $request)
    {
        return $this->success($this->roomService->delete($request->id));
    }

    public function list(ListRequest $request)
    {
        return $this->success($this->roomService->list($request->name));
    }
}
