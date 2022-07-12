<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\StudentCreateCommand;
use App\Application\Commands\StudentUpdateCommand;
use App\Application\Services\StudentService;
use App\Interfaces\Http\Requests\DeleteRequest;
use App\Interfaces\Http\Requests\FindRequest;
use App\Interfaces\Http\Requests\Student\CreateRequest;
use App\Interfaces\Http\Requests\Student\ListRequest;
use App\Interfaces\Http\Requests\Student\UpdateRequest;

class StudentController extends Controller
{
    public function __construct(
        private StudentService $studentService
    ) {}

    public function create(CreateRequest $request)
    {
        $studentCreateCommand = new StudentCreateCommand(
            $request->name,
            $request->age,
            $request->sex
        );
        return $this->success($this->studentService->create($studentCreateCommand)->toArray());
    }

    public function find(FindRequest $request)
    {
        return $this->success($this->studentService->find($request->id)->toArray());
    }

    public function update(UpdateRequest $request)
    {
        $studentUpdateCommand = new StudentUpdateCommand(
            $request->id,
            $request->name,
            $request->age,
            $request->sex
        );
        return $this->success($this->studentService->update($studentUpdateCommand)->toArray());
    }

    public function delete(DeleteRequest $request)
    {
        return $this->success($this->studentService->delete($request->id));
    }

    public function list(ListRequest $request)
    {
        return $this->success($this->studentService->list($request->name));
    }
}
