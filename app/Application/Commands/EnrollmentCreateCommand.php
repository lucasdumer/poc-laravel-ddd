<?php

namespace App\Application\Commands;

use App\Domain\School\Enrollment\IEnrollmentCreateCommand;

class EnrollmentCreateCommand implements IEnrollmentCreateCommand
{
    public function __construct(
        private int $teamId,
        private int $studentId
    ) {}

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getStudentId(): int
    {
        return $this->studentId;
    }
}
