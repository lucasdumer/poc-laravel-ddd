<?php

namespace App\Application\Commands;

use App\Domain\School\Team\ITeamCreateCommand;

class TeamCreateCommand implements ITeamCreateCommand
{
    public function __construct(
        private int $courseId,
        private int $roomId,
        private \DateTime $start,
        private \DateTime $end,
        private string $shift
    ) {}

    public function getCourseId(): int
    {
        return $this->courseId;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getStart(): \DateTime
    {
        return $this->start;
    }

    public function getEnd(): \DateTime
    {
        return $this->end;
    }

    public function getShift(): string
    {
        return $this->shift;
    }
}
