<?php

namespace App\Application\Commands;

use App\Domain\School\Room\IRoomCreateCommand;

class RoomCreateCommand implements IRoomCreateCommand
{
    public function __construct(
        private string $name,
        private int $numberMaximumPeople
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumberMaximumPeople(): int
    {
        return $this->numberMaximumPeople;
    }
}
