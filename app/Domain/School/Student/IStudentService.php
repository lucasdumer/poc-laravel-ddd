<?php

namespace App\Domain\School\Student;

interface IStudentService
{
    public function create(IStudentCreateCommand $studentCreateCommand): Student;
    public function find(int $id): Student;
    public function update(IStudentUpdateCommand $studentUpdateCommand): Student;
    public function delete(int $id): bool;
    public function list(string $name = null): array;
}
