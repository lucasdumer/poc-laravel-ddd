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
        try {
            $teamCreateCommand = new TeamCreateCommand(
                $request->course_id,
                $request->room_id,
                new \DateTime($request->start),
                new \DateTime($request->end),
                $request->shift
            );
            return $this->success($this->teamService->create($teamCreateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(FindRequest $request)
    {
        try {
            return $this->success($this->teamService->find($request->id)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $teamUpdateCommand = new TeamUpdateCommand(
                $request->id,
                $request->course_id,
                $request->room_id,
                new \DateTime($request->start),
                new \DateTime($request->end),
                $request->shift
            );
            return $this->success($this->teamService->update($teamUpdateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(DeleteRequest $request)
    {
        try {
            return $this->success($this->teamService->delete($request->id));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(ListRequest $request)
    {
        try {
            return $this->success($this->teamService->list(
                $request->course_id,
                $request->room_id
            ));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
