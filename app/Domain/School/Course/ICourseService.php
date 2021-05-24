<?php

namespace App\Domain\School\Course;

interface ICourseService
{
    public function create(ICourseCreateCommand $courseCreateCommand): Course;
    public function find(int $id): Course;
    public function update(ICourseUpdateCommand $courseUpdateCommand): Course;
    public function delete(int $id): bool;
    public function list(
        string $name = null,
        string $description = null
    ): array;
}
