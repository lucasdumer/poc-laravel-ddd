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

    public function update(UpdateRequest $request)
    {
        try {
            $roomUpdateCommand = new RoomUpdateCommand(
                $request->id,
                $request->name
            );
            return $this->success($this->roomService->update($roomUpdateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(DeleteRequest $request)
    {
        try {
            return $this->success($this->roomService->delete($request->id));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(ListRequest $request)
    {
        try {
            return $this->success($this->roomService->list($request->name));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
