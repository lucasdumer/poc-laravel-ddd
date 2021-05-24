<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Course\Course;
use App\Domain\School\Course\ICourseRepository;
use App\Infrastructure\Models\CourseModel;

class CourseRepository implements ICourseRepository
{
    public function create(Course $course): Course
    {
        try {
            $courseModel = new CourseModel();
            $courseModel->name = $course->getName();
            $courseModel->description = $course->getDescription();
            $courseModel->save();
            $course->setId($courseModel->id);
            return $course;
        } catch(\Exception $e) {
            throw new \Exception("Database error on creating course. ".$e->getMessage());
        }
    }

    public function find(int $id): Course
    {
        try {
            $courseModel = CourseModel::find($id);
            if (!$courseModel) {
                throw new \Exception("Dont find course with id: ".$id);
            }
            $course = new Room($courseModel->name, $courseModel->description);
            $course->setId($courseModel->id);
            return $course;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find course. ".$e->getMessage());
        }
    }

    public function update(Course $course): Course
    {
        try {
            CourseModel::where('id', $course->getId())
                ->update([
                    'name' => $course->getName(),
                    'description' => $course->getDescription()
                ]);
            return $course;
        } catch(\Exception $e) {
            throw new \Exception("Database error on update course. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            CourseModel::where('id', $id)->delete();
            return true;
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete course. ".$e->getMessage());
        }
    }

    public function list(string $name = null, string $description = null): array
    {
        try {
            $table = DB::table('courses');
            if (!empty($name)) {
                $table->where('name', 'like', '%'.$name.'%');
            }
            if (!empty($description)) {
                $table->where('description', 'like', '%'.$description.'%');
            }
            $courses = $table->get();
            return array_map(function ($courseModel) {
                $course = new Corse($courseModel->name, $courseModel->description);
                $course->setId($courseModel->id);
                return $course->toArray();
            }, $courses->toArray());
        } catch(\Exception $e) {
            throw new \Exception("Database error on list course. ".$e->getMessage());
        }
    }
}
