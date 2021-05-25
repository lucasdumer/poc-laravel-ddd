<?php

namespace App\Domain\School\Team;

interface ITeamRepository
{
    public function create(Team $room): Team;
    public function find(int $id): Team;
    public function update(Team $room): Team;
    public function delete(int $id): bool;
    public function list(): array;
}
