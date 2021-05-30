<?php

namespace App\Domain\School\Enrollment;

interface IEnrollmentUpdateCommand extends IEnrollmentCreateCommand
{
    public function getId(): int;
}
