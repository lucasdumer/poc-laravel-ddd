<?php

namespace App\Domain\School\Student;

class Student
{
    private int $id;

    public function __construct(
        private string $name,
        private int $age,
        private string $sex
    ) {
        $this->validate();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    private function validate(): void
    {
        if (empty($this->name)) {
            throw new \Exception("Student name invalid.");
        }

        if ($this->age <= 0) {
            throw new \Exception("Student age invalid.");
        }

        if ($this->sex != 'male' && $this->sex != 'female') {
            throw new \Exception("Student sex invalid.");
        }
    }
}
