<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\TeamCreateCommand;
use App\Application\Services\TeamService;
use App\Interfaces\Http\Requests\Team\CreateRequest;
use App\Interfaces\Http\Requests\Team\ListRequest;

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

    public function list(ListRequest $request)
    {
        try {
            return $this->success($this->teamService->list());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
