<?php

namespace App\Domain\School\Student;

interface IStudentCreateCommand
{
    public function getName(): string;
    public function getAge(): int;
    public function getSex(): string;
}
