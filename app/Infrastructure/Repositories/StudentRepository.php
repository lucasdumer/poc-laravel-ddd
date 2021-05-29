<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Student\IStudentRepository;
use App\Domain\School\Student\Student;
use App\Infrastructure\Models\StudentModel;
use Illuminate\Support\Facades\DB;

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
            if (!$studentModel) {
                throw new \Exception("Dont find student with id: ".$id);
            }
            $student = new Student($studentModel->name, $studentModel->age, $studentModel->sex);
            $student->setId($studentModel->id);
            return $student;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find student. ".$e->getMessage());
        }
    }

    public function update(Student $student): Student
    {
        try {
            StudentModel::where('id', $student->getId())
                ->update([
                    'name' => $student->getName(),
                    'age' => $student->getAge(),
                    'sex' => $student->getSex()
                ]);
            return $student;
        } catch(\Exception $e) {
            throw new \Exception("Database error on update student. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            StudentModel::where('id', $id)->delete();
            return true;
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete student. ".$e->getMessage());
        }
    }

    private function get(string $name = null): array
    {
        $table = DB::table('students');
        if (!empty($name)) {
            $table->where('name', '=', $name);
        }
        return $table->get()->toArray();
    }

    public function list(string $name = null): array
    {
        try {
            return $this->toArray($this->get($name));
        } catch(\Exception $e) {
            throw new \Exception("Database error on list student. ".$e->getMessage());
        }
    }

    private function toArray($students): array
    {
        return array_map(function ($studentModel) {
            return [
                'id' => $studentModel->id,
                'name' => $studentModel->name,
                'age' => $studentModel->age,
                'sex' => $studentModel->sex,
            ];
        }, $students);
    }
}
