<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Student\IStudentRepository;
use App\Domain\School\Student\Student;
use App\Infrastructure\Models\StudentModel;

class StudentRepository implements IStudentRepository
{
    public function create(Student $student): Student
    {
        try {
            $studentModel = new StudentModel();
            $studentModel->name = $student->getName();
            $studentModel->age = $student->getAge();
            $studentModel->sex = $student->getSex();
            $studentModel->save();
            $student->setId($studentModel->id);
            return $student;
        } catch(\Exception $e) {
            throw new \Exception("Database error on create student. ".$e->getMessage());
        }
    }

    public function find(int $id): Student
    {
        try {
            $studentModel = StudentModel::find($id);
        } catch(\Exception $e) {
            throw new \Exception("Database error on find student. ".$e->getMessage());
        }
    }

    public function update(Student $student): Student
    {
        try {

        } catch(\Exception $e) {
            throw new \Exception("Database error on update student. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {

        } catch(\Exception $e) {
            throw new \Exception("Database error on delete student. ".$e->getMessage());
        }
    }

    public function list(string $name = null): array
    {
        try {

        } catch(\Exception $e) {
            throw new \Exception("Database error on list student. ".$e->getMessage());
        }
    }
}
