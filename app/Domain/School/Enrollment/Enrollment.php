<?php

namespace App\Domain\School\Enrollment;

use App\Domain\School\Student\Student;
use App\Domain\School\Team\Team;

class Enrollment
{
    private int $id;

    public function __construct(
        private Team $team,
        private Student $student
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTeam(): Team
    {
        return $this->team;
    }

    public function setTeam(Team $team): void
    {
        $this->team = $team;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function update(Team $team, Student $student)
    {
        $this->team = $team;
        $this->student = $student;
    }
}
