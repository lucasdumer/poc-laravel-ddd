<?php

namespace App\Domain\School\Enrollment;

interface IEnrollmentService
{
    public function create(IEnrollmentCreateCommand $enrollmentCreateCommand): Enrollment;
    public function find(int $id): Enrollment;
    public function update(IEnrollmentUpdateCommand $enrollmentUpdateCommand): Enrollment;
    public function delete(int $id): bool;
    public function list(): array;
}
