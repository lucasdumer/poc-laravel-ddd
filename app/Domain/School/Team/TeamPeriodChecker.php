<?php

namespace App\Domain\School\Team;

use App\Domain\School\Team\Period;
use App\Domain\School\Team\Team;

abstract class TeamPeriodChecker
{
    protected function comparePeriods(Team $team, Period $period, string $shift): void
    {
        if (
            !($period->getEnd() < $team->getPeriod()->getStart() || $period->getStart() > $team->getPeriod()->getEnd()) &&
            $team->getShift() == $shift
        ) {
            throw new \Exception("There is already a class in the range.");
        }
    }
}
