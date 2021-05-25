<?php

namespace App\Application\Commands;

use App\Domain\School\Team\ITeamUpdateCommand;

class TeamUpdateCommand implements ITeamUpdateCommand
{
    public function __construct(
        private int $id,
        private int $courseId,
        private int $roomId,
        private \DateTime $start,
        private \DateTime $end,
        private string $shift
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

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
