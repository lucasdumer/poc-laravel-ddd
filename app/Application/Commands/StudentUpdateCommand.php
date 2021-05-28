<?php

namespace App\Application\Commands;

use App\Domain\School\Student\IStudentUpdateCommand;

class StudentUpdateCommand implements IStudentUpdateCommand
{
    public function __construct(
        private int $id,
        private string $name,
        private int $age,
        private string $sex
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

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
