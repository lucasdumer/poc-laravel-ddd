<?php

namespace App\Domain\School\Team;

interface ITeamService
{
    public function create(ITeamCreateCommand $teamCreateCommand): Team;
    public function find(int $id): Team;
    public function update(ITeamUpdateCommand $teamUpdateCommand): Team;
    public function delete(int $id): bool;
    public function list(): array;
}
