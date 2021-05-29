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
        try {
            $studentCreateCommand = new StudentCreateCommand(
                $request->name,
                $request->age,
                $request->sex
            );
            return $this->success($this->studentService->create($studentCreateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(FindRequest $request)
    {
        try {
            return $this->success($this->studentService->find($request->id)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $studentUpdateCommand = new StudentUpdateCommand(
                $request->id,
                $request->name,
                $request->age,
                $request->sex
            );
            return $this->success($this->studentService->update($studentUpdateCommand)->toArray());
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(DeleteRequest $request)
    {
        try {
            return $this->success($this->studentService->delete($request->id));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(ListRequest $request)
    {
        try {
            return $this->success($this->studentService->list($request->name));
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
