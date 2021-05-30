<?php

namespace App\Domain\School\Enrollment;

interface IEnrollmentCreateCommand
{
    public function getTeamId(): int;
    public function getStudentId(): int;
}
