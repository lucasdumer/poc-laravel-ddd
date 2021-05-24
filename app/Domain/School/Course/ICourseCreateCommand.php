<?php

namespace App\Domain\School\Course;

interface ICourseCreateCommand
{
    public function getName(): string;
    public function getDescription(): int;
}
