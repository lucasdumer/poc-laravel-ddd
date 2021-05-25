<?php

namespace App\Domain\School\Team;

interface ITeamCreateCommand
{
    public function getCourseId(): int;
    public function getRoomId(): int;
    public function getStart(): \DateTime;
    public function getEnd(): \DateTime;
    public function getShift(): int;
}
