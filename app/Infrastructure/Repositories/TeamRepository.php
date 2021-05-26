<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Team\ITeamRepository;
use App\Domain\School\Team\Period;
use App\Domain\School\Team\Team;
use App\Infrastructure\Models\TeamModel;
use Illuminate\Support\Facades\DB;

class TeamRepository implements ITeamRepository
{
    public function __construct(
        private CourseRepository $courseRepository,
        private RoomRepository $roomRepository,
    ) {}
    public function create(Team $team): Team
    {
        try {
            $teamModel = new TeamModel();
            $teamModel->course_id = $team->getCourse()->getId();
            $teamModel->room_id = $team->getRoom()->getId();
            $teamModel->start = $team->getPeriod()->getStart();
            $teamModel->end = $team->getPeriod()->getEnd();
            $teamModel->shift = $team->getShift();
            $teamModel->save();
            $team->setId($teamModel->id);
            return $team;
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete team. ".$e->getMessage());
        }
    }

    public function find(int $id): Team
    {
        try {
            $teamModel = TeamModel::find($id);
            $course = $this->courseRepository->find($teamModel->course_id);
            $room = $this->roomRepository->find($teamModel->room_id);
            $team = new Team(
                $course,
                $room,
                new Period(new \DateTime($teamModel->start), new \DateTime($teamModel->end)),
                $teamModel->shift
            );
            $team->setId($teamModel->id);
            return $team;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find team. ".$e->getMessage());
        }
    }

    public function update(Team $team): Team
    {
        try {
            TeamModel::where('id', $team->getId())
                ->update([
                    'course_id' => $team->getCourse()->getId(),
                    'room_id' => $team->getRoom()->getId(),
                    'start' => $team->getPeriod()->getStart(),
                    'end' => $team->getPeriod()->getEnd(),
                    'shift' => $team->getShift()
                ]);
            return $team;
        } catch(\Exception $e) {
            throw new \Exception("Database error on update team. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            TeamModel::where('id', $id)->delete();
            return true;
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete team. ".$e->getMessage());
        }
    }

    public function list(int $courseId = null, int $roomId = null): array
    {
        try {
            $table = DB::table('teams');
            if (!empty($courseId)) {
                $table->where('course_id', '=', $courseId);
            }
            if (!empty($roomId)) {
                $table->where('room_id', '=', $roomId);
            }
            $teams = $table->get();
            return $this->map($teams->toArray());
        } catch(\Exception $e) {
            throw new \Exception("Database error on list team. ".$e->getMessage());
        }
    }

    private function map(array $teams): array
    {
        return array_map(function ($teamModel) {
            return [
                'id' => $teamModel->id,
                'course_id' => $teamModel->course_id,
                'room_id' => $teamModel->room_id,
                'start' => $teamModel->start,
                'end' => $teamModel->end,
                'shift' => $teamModel->shift
            ];
        }, $teams);
    }
}
