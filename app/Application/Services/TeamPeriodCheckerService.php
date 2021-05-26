<?php

namespace App\Application\Services;

use App\Domain\School\Room\Room;
use App\Domain\School\Team\TeamPeriodChecker;
use App\Domain\School\Team\Period;
use App\Infrastructure\Repositories\TeamRepository;

class TeamPeriodCheckerService extends TeamPeriodChecker
{
    public function __construct(
        private TeamRepository $teamRepository
    ) {}

    public function check(Room $room, Period $period, string $shift): void
    {
        $teams = $this->teamRepository->loadListObj(roomId: $room->getId());
        foreach($teams as $team) {
            parent::comparePeriods($team, $period, $shift);
        }
    }
}
