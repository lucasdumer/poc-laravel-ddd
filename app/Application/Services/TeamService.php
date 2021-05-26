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
            $room = $this->roomService->find($teamCreateCommand->getRoomId());
            $team = new Team(
                $course,
                $room,
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
        try {
            return $this->teamRepository->find($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on find team. ".$e->getMessage());
        }
    }

    public function update(ITeamUpdateCommand $teamUpdateCommand): Team
    {
        try {
            $course = $this->courseService->find($teamUpdateCommand->getCourseId());
            $room = $this->roomService->find($teamUpdateCommand->getRoomId());
            $team = $this->find($teamUpdateCommand->getId());
            $team->setCourse($course);
            $team->setRoom($room);
            $team->setPeriod(new Period($teamUpdateCommand->getStart(), $teamUpdateCommand->getEnd()));
            $team->setShift($teamUpdateCommand->getShift());
            return $this->teamRepository->update($team);
        } catch(\Exception $e) {
            throw new \Exception("Service error on update team. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function list(int $courseId = null, int $roomId = null): array
    {
        // TODO: Implement list() method.
    }
}
