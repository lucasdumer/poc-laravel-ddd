<?php

namespace App\Application\Commands;

use App\Domain\School\Enrollment\IEnrollmentUpdateCommand;

class EnrollmentUpdateCommand implements IEnrollmentUpdateCommand
{
    public function __construct(
        private int $id,
        private int $teamId,
        private int $studentId
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getStudentId(): int
    {
        return $this->studentId;
    }
}
