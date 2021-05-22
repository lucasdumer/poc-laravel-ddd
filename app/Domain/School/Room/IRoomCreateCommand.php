<?php

namespace App\Domain\School\Room;

interface IRoomCreateCommand
{
    public function getNumber(): int;
    public function getNumberMaximumPeople(): int;
}
