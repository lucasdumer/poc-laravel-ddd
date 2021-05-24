<?php

namespace App\Domain\School\Course;

interface ICourseUpdateCommand extends ICourseCreateCommand
{
    public function getId(): int;
}
