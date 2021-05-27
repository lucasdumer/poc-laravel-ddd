<?php

namespace App\Domain\School\Student;

interface IStudentUpdateCommand extends IStudentCreateCommand
{
    public function getId(): int;
}
