<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\EnrollmentCreateCommand;
use App\Application\Commands\EnrollmentUpdateCommand;
use App\Application\Services\EnrollmentService;
use App\Interfaces\Http\Requests\DeleteRequest;
use App\Interfaces\Http\Requests\Enrollment\CreateRequest;
use App\Interfaces\Http\Requests\Enrollment\ListRequest;
use App\Interfaces\Http\Requests\Enrollment\UpdateRequest;
use App\Interfaces\Http\Requests\FindRequest;

class EnrollmentController extends Controller
{
    public function __construct(
        private EnrollmentService $enrollmentService
    ) {}

    public function create(CreateRequest $request)
    {
        $enrollmentCreateCommand = new EnrollmentCreateCommand(
            $request->team_id,
            $request->student_id,
        );
        return $this->success($this->enrollmentService->create($enrollmentCreateCommand)->toArray());
    }

    public function find(FindRequest $request)
    {
        return $this->success($this->enrollmentService->find($request->id)->toArray());
    }

    public function update(UpdateRequest $request)
    {
        $enrollmentUpdateCommand = new EnrollmentUpdateCommand(
            $request->id,
            $request->team_id,
            $request->student_id,
        );
        return $this->success($this->enrollmentService->update($enrollmentUpdateCommand)->toArray());
    }

    public function delete(DeleteRequest $request)
    {
        return $this->success($this->enrollmentService->delete($request->id));
    }

    public function list(ListRequest $request)
    {
        return $this->success($this->enrollmentService->list());
    }
}
