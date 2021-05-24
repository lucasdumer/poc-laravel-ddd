<?php

namespace App\Domain\School\Course;

interface ICourseRepository
{
    public function create(Course $course): Course;
    public function find(int $id): Course;
    public function update(Course $course): Course;
    public function delete(int $id): bool;
    public function list(
        string $name = null,
        string $description = null
    ): array;
}
