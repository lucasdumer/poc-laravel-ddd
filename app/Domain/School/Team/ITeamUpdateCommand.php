<?php

namespace App\Domain\School\Team;

interface ITeamUpdateCommand extends ITeamCreateCommand
{
    public function getId(): int;
}
