<?php

namespace App\Domain\School\Team;

interface ITeamRepository
{
    public function create(Team $team): Team;
    public function find(int $id): Team;
    public function update(Team $team): Team;
    public function delete(int $id): bool;
    public function list(int $courseId = null, int $roomId = null): array;
}
