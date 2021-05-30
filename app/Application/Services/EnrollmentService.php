<?php

namespace App\Application\Services;

use App\Domain\School\Enrollment\Enrollment;
use App\Domain\School\Enrollment\IEnrollmentCreateCommand;
use App\Domain\School\Enrollment\IEnrollmentService;
use App\Domain\School\Enrollment\IEnrollmentUpdateCommand;
use App\Infrastructure\Repositories\EnrollmentRepository;
use App\Infrastructure\Repositories\StudentRepository;
use App\Infrastructure\Repositories\TeamRepository;

class EnrollmentService implements IEnrollmentService
{
    public function __construct(
        private EnrollmentRepository $enrollmentRepository,
        private TeamRepository $teamRepository,
        private StudentRepository $studentRepository
    ) {}

    public function create(IEnrollmentCreateCommand $enrollmentCreateCommand): Enrollment
    {
        try {
            $team = $this->teamRepository->find($enrollmentCreateCommand->getTeamId());
            $student = $this->studentRepository->find($enrollmentCreateCommand->getStudentId());
            $enrollment = new Enrollment($team, $student);
            return $this->enrollmentRepository->create($enrollment);
        } catch(\Exception $e) {
            throw new \Exception("Service error on creating enrollment. ".$e->getMessage());
        }
    }

    public function find(int $id): Enrollment
    {
        try {
            return $this->enrollmentRepository->find($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on find enrollment. ".$e->getMessage());
        }
    }

    public function update(IEnrollmentUpdateCommand $enrollmentUpdateCommand): Enrollment
    {
        try {
            $team = $this->teamRepository->find($enrollmentUpdateCommand->getTeamId());
            $student = $this->studentRepository->find($enrollmentUpdateCommand->getStudentId());
            $enrollment = $this->find($enrollmentUpdateCommand->getId());
            $enrollment->update($team, $student);
            return $this->enrollmentRepository->update($enrollment);
        } catch(\Exception $e) {
            throw new \Exception("Service error on update enrollment. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->enrollmentRepository->delete($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on delete enrollment. ".$e->getMessage());
        }
    }

    public function list(): array
    {
        try {
            return $this->enrollmentRepository->list();
        } catch(\Exception $e) {
            throw new \Exception("Service error on list enrollment. ".$e->getMessage());
        }
    }
}
