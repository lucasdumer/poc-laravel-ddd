<?php

namespace App\Domain\School\Room;

class Room
{
    private int $id;

    public function __construct(
        private string $name,
        private int $numberMaximumPeople
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

    private function validate(): void
    {
        if (empty($this->name)) {
            throw new \Exception("Room name invalid.");
        }

        if ($this->numberMaximumPeople <= 0) {
            throw new \Exception("Room number maximum of people invalid.");
        }
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
