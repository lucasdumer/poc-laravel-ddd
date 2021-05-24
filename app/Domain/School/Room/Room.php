<?php

namespace App\Domain\School;

class Room
{
    private int $id;

    public function __construct(
        private string $name,
        private int $numberMaximumPeople
    ) {}

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

    public function setName(int $name): void
    {
        $this->name = $name;
    }

    public function getNumberMaximumPeople(): int
    {
        return $this->numberMaximumPeople;
    }

    public function exceedsTheMaximumNumberOfPeople($numberPeople): boolean
    {
        return $this->numberMaximumPeople > $numberPeople;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'numberMaximumPeople' => $this->numberMaximumPeople
        ];
    }
}
