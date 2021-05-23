<?php

namespace App\Domain\School\Room;

interface IRoomUpdateCommand
{
    public function getId(): int;
    public function getName(): string;
}
