<?php

namespace App\Application\Services;

use App\Domain\School\Student\IStudentCreateCommand;
use App\Domain\School\Student\IStudentService;
use App\Domain\School\Student\IStudentUpdateCommand;
use App\Domain\School\Student\Student;

class EnrollmentService implements IStudentService
{
    public function create(IStudentCreateCommand $studentCreateCommand): Student
    {
        // TODO: Implement create() method.
    }

    public function find(int $id): Student
    {
        // TODO: Implement find() method.
    }

    public function update(IStudentUpdateCommand $studentUpdateCommand): Student
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function list(string $name = null): array
    {
        // TODO: Implement list() method.
    }
}
