<?php

namespace App\Application\Commands;

use App\Domain\School\Room\IRoomUpdateCommand;

class RoomUpdateCommand implements IRoomUpdateCommand
{
    public function __construct(
        private int $id,
        private string $name
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
