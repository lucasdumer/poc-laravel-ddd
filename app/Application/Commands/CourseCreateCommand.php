<?php

namespace App\Application\Commands;

use App\Domain\School\Course\ICourseCreateCommand;

class CourseCreateCommand implements ICourseCreateCommand
{
    public function __construct(
        private string $name,
        private string $description
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
