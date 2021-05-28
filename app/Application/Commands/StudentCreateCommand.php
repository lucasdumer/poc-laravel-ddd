<?php

namespace App\Application\Commands;

use App\Domain\School\Student\IStudentCreateCommand;

class StudentCreateCommand implements IStudentCreateCommand
{
    public function __construct(
        private string $name,
        private int $age,
        private string $sex
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getSex(): string
    {
        return $this->sex;
    }
}
