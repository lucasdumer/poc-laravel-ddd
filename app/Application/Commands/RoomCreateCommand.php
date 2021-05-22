<?php

namespace App\Application\Commands;

use App\Domain\School\Room\IRoomCreateCommand;

class RoomCreateCommand implements IRoomCreateCommand
{
    public function __construct(
        private int $number,
        private int $numberMaximumPeople
    ) {}

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getNumberMaximumPeople(): int
    {
        return $this->numberMaximumPeople;
    }
}
