<?php

namespace App\Domain\School\Course;

class Course
{
    private int $id;

    public function __construct(
        private string $name,
        private string $description
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function update(string $name, string $description): void
    {
        $this->name = $name;
        $this->description = $description;
    }

    private function validate(): void
    {
        if (empty($this->name)) {
            throw new \Exception("Course name invalid.");
        }

        if (empty($this->description)) {
            throw new \Exception("Course description invalid.");
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
