<?php

namespace App\Domain\School\Room;

interface IRoomUpdateCommand extends IRoomCreateCommand
{
    public function getId(): int;
}
