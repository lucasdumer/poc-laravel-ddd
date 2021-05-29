<?php

namespace App\Application\Services;

use App\Domain\School\Student\IStudentCreateCommand;
use App\Domain\School\Student\IStudentService;
use App\Domain\School\Student\IStudentUpdateCommand;
use App\Domain\School\Student\Student;
use App\Infrastructure\Repositories\StudentRepository;

class StudentService implements IStudentService
{
    public function __construct(
        private StudentRepository $studentRepository
    ) {}

    public function create(IStudentCreateCommand $studentCreateCommand): Student
    {
        try {
            $student = new Student(
                $studentCreateCommand->getName(),
                $studentCreateCommand->getAge(),
                $studentCreateCommand->getSex()
            );
            return $this->studentRepository->create($student);
        } catch(\Exception $e) {
            throw new \Exception("Service error on creating student. ".$e->getMessage());
        }
    }

    public function find(int $id): Student
    {
        try {
            return $this->studentRepository->find($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on find student. ".$e->getMessage());
        }
    }

    public function update(IStudentUpdateCommand $studentUpdateCommand): Student
    {
        try {
            $student = $this->find($studentUpdateCommand->getId());
            $student->update(
                $studentUpdateCommand->getName(),
                $studentUpdateCommand->getAge(),
                $studentUpdateCommand->getSex()
            );
            return $this->studentRepository->update($student);
        } catch(\Exception $e) {
            throw new \Exception("Service error on update student. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->studentRepository->delete($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on delete student. ".$e->getMessage());
        }
    }

    public function list(string $name = null): array
    {
        try {
            return $this->studentRepository->list($name);
        } catch(\Exception $e) {
            throw new \Exception("Service error on list student. ".$e->getMessage());
        }
    }
}
