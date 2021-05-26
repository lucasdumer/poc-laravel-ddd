<?php

namespace App\Application\Services;

use App\Domain\School\Course\Course;
use App\Domain\School\Course\ICourseCreateCommand;
use App\Domain\School\Course\ICourseService;
use App\Domain\School\Course\ICourseUpdateCommand;
use App\Infrastructure\Repositories\CourseRepository;

class CourseService implements ICourseService
{
    public function __construct(
        private CourseRepository $courseRepository
    ) {}

    public function create(ICourseCreateCommand $courseCreateCommand): Course
    {
        try {
            $course = new Course($courseCreateCommand->getName(), $courseCreateCommand->getDescription());
            return $this->courseRepository->create($course);
        } catch(\Exception $e) {
            throw new \Exception("Service error on creating course. ".$e->getMessage());
        }
    }

    public function find(int $id): Course
    {
        try {
            return $this->courseRepository->find($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on find course. ".$e->getMessage());
        }
    }

    public function update(ICourseUpdateCommand $courseUpdateCommand): Course
    {
        try {
            $course = $this->find($courseUpdateCommand->getId());
            $course->update($courseUpdateCommand->getName(), $courseUpdateCommand->getDescription());
            return $this->courseRepository->update($course);
        } catch(\Exception $e) {
            throw new \Exception("Service error on update course. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->courseRepository->delete($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on delete course. ".$e->getMessage());
        }
    }

    public function list(string $name = null, string $description = null): array
    {
        try {
            return $this->courseRepository->list(name: $name, description: $description);
        } catch(\Exception $e) {
            throw new \Exception("Service error on list course. ".$e->getMessage());
        }
    }
}
