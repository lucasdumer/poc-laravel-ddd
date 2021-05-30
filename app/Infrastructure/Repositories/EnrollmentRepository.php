<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Enrollment\Enrollment;
use App\Domain\School\Enrollment\IEnrollmentRepository;
use App\Infrastructure\Models\EnrollmentModel;
use Illuminate\Support\Facades\DB;

class EnrollmentRepository implements IEnrollmentRepository
{
    public function __construct(
        private TeamRepository $teamRepository,
        private StudentRepository $studentRepository
    ) {}

    public function create(Enrollment $enrollment): Enrollment
    {
        try {
            $enrollmentModel = new EnrollmentModel();
            $enrollmentModel->team_id = $enrollment->getTeam()->getId();
            $enrollmentModel->student_id = $enrollment->getStudent()->getId();
            $enrollmentModel->save();
            $enrollment->setId($enrollmentModel->id);
            return $enrollment;
        } catch(\Exception $e) {
            throw new \Exception("Database error on create enrollment. ".$e->getMessage());
        }
    }

    public function find(int $id): Enrollment
    {
        try {
            $enrollmentModel = EnrollmentModel::find($id);
            if (!$enrollmentModel) {
                throw new \Exception("Dont find enrollment with id: ".$id);
            }
            $team = $this->teamRepository->find($enrollmentModel->team_id);
            $student = $this->studentRepository->find($enrollmentModel->student_id);
            $enrollment = new Enrollment($team, $student);
            $enrollment->setId($enrollmentModel->id);
            return $enrollment;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find enrollment. ".$e->getMessage());
        }
    }

    public function update(Enrollment $enrollment): Enrollment
    {
        try {
            EnrollmentModel::where('id', $enrollment->getId())
                ->update([
                    'team_id' => $enrollment->getTeam()->getId(),
                    'student_id' => $enrollment->getStudent()->getId()
                ]);
            return $enrollment;
        } catch(\Exception $e) {
            throw new \Exception("Database error on update enrollment. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            EnrollmentModel::where('id', $id)->delete();
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete enrollment. ".$e->getMessage());
        }
    }

    public function list(): array
    {
        try {
            $table = DB::table('enrollments');
            return $this->toArray($table->get()->toArray());
        } catch(\Exception $e) {
            throw new \Exception("Database error on list enrollment. ".$e->getMessage());
        }
    }

    private function toArray(array $enrollments): array
    {
        return array_map(function ($enrollmentModel) {
            return [
                'id' => $enrollmentModel->id,
                'team_id' => $enrollmentModel->team_id,
                'student_id' => $enrollmentModel->student_id,
            ];
        }, $enrollments);
    }
}
