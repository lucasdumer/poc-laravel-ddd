<?php

namespace App\Application\Services;

use App\Domain\School\Team\ITeamCreateCommand;
use App\Domain\School\Team\ITeamService;
use App\Domain\School\Team\ITeamUpdateCommand;
use App\Domain\School\Team\Period;
use App\Domain\School\Team\Team;
use App\Infrastructure\Repositories\TeamRepository;

class TeamService implements ITeamService
{
    public function __construct(
        private CourseService $courseService,
        private RoomService $roomService,
        private TeamRepository $teamRepository
    ) {}
    public function create(ITeamCreateCommand $teamCreateCommand): Team
    {
        try {
            $course = $this->courseService->find($teamCreateCommand->getCourseId());
            $team = $this->roomService->find($teamCreateCommand->getRoomId());
            $team = new Team(
                $course,
                $team,
                new Period($teamCreateCommand->getStart(), $teamCreateCommand->getEnd()),
                $teamCreateCommand->getShift()
            );
            return $this->teamRepository->create($team);
        } catch(\Exception $e) {
            throw new \Exception("Service error on creating team. ".$e->getMessage());
        }
    }

    public function find(int $id): Team
    {
        // TODO: Implement find() method.
    }

    public function update(ITeamUpdateCommand $teamUpdateCommand): Team
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function list(): array
    {
        // TODO: Implement list() method.
    }
}
