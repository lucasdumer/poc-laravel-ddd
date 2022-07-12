<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\TeamCreateCommand;
use App\Application\Commands\TeamUpdateCommand;
use App\Application\Services\TeamService;
use App\Interfaces\Http\Requests\DeleteRequest;
use App\Interfaces\Http\Requests\FindRequest;
use App\Interfaces\Http\Requests\Team\CreateRequest;
use App\Interfaces\Http\Requests\Team\ListRequest;
use App\Interfaces\Http\Requests\Team\UpdateRequest;

class TeamController extends Controller
{
    public function __construct(
        private TeamService $teamService
    ) {}

    public function create(CreateRequest $request)
    {
        $teamCreateCommand = new TeamCreateCommand(
            $request->course_id,
            $request->room_id,
            new \DateTime($request->start),
            new \DateTime($request->end),
            $request->shift
        );
        return $this->success($this->teamService->create($teamCreateCommand)->toArray());
    }

    public function find(FindRequest $request)
    {
        return $this->success($this->teamService->find($request->id)->toArray());
    }

    public function update(UpdateRequest $request)
    {
        $teamUpdateCommand = new TeamUpdateCommand(
            $request->id,
            $request->course_id,
            $request->room_id,
            new \DateTime($request->start),
            new \DateTime($request->end),
            $request->shift
        );
        return $this->success($this->teamService->update($teamUpdateCommand)->toArray());
    }

    public function delete(DeleteRequest $request)
    {
        return $this->success($this->teamService->delete($request->id));
    }

    public function list(ListRequest $request)
    {
        return $this->success($this->teamService->list(
            $request->course_id,
            $request->room_id
        ));
    }
}
