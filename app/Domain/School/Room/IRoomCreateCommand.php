<?php

namespace App\Domain\School\Room;

interface IRoomCreateCommand
{
    public function getName(): string;
    public function getNumberMaximumPeople(): int;
}
