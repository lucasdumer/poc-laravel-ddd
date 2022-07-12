<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Commands\CourseCreateCommand;
use App\Application\Commands\CourseUpdateCommand;
use App\Application\Services\CourseService;
use App\Interfaces\Http\Requests\Course\CreateRequest;
use App\Interfaces\Http\Requests\Course\ListRequest;
use App\Interfaces\Http\Requests\Course\UpdateRequest;
use App\Interfaces\Http\Requests\FindRequest;
use App\Interfaces\Http\Requests\DeleteRequest;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $courseService
    ) {}

    public function create(CreateRequest $request)
    {
        $courseCreateCommand = new CourseCreateCommand(
            $request->name,
            $request->description
        );
        return $this->success($this->courseService->create($courseCreateCommand)->toArray());
    }

    public function find(FindRequest $request)
    {
        return $this->success($this->courseService->find($request->id)->toArray());
    }

    public function update(UpdateRequest $request)
    {
        $courseUpdateCommand = new CourseUpdateCommand(
            $request->id,
            $request->name,
            $request->description
        );
        return $this->success($this->courseService->update($courseUpdateCommand)->toArray());
    }

    public function delete(DeleteRequest $request)
    {
        return $this->success($this->courseService->delete($request->id));
    }

    public function list(ListRequest $request)
    {
        return $this->success($this->courseService->list($request->name, $request->description));
    }
}
