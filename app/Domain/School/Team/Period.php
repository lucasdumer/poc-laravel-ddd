<?php

namespace App\Domain\School\Team;

class Period
{
    private \DateTime $start;

    private \DateTime $end;

    public function __construct(\DateTime $start, \DateTime $end)
    {
        if ($start > $end) {
            throw new \Exception("Period invalid.");
        }

        $this->start = $start;
        $this->end = $end;
    }

    public function getStart(): \DateTime
    {
        return $this->start;
    }

    public function getEnd(): \DateTime
    {
        return $this->end;
    }
}
