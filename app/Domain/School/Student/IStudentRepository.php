<?php

namespace App\Domain\School\Student;

interface IStudentRepository
{
    public function create(Student $student): Student;
    public function find(int $id): Student;
    public function update(Student $student): Student;
    public function delete(int $id): bool;
    public function list(string $name = null): array;
}
