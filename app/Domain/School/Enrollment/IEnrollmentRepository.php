<?php

namespace App\Domain\School\Enrollment;

interface IEnrollmentRepository
{
    public function create(Enrollment $enrollment): Enrollment;
    public function find(int $id): Enrollment;
    public function update(Enrollment $enrollment): Enrollment;
    public function delete(int $id): bool;
    public function list(): array;
}
