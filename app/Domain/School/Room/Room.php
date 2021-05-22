<?php

namespace App\Domain\School\Room;

class Room
{
    private int $id;

    public function __construct(
        private int $number,
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

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getNumberMaximumPeople(): int
    {
        return $this->numberMaximumPeople;
    }

    public function setNumberMaximumPeople(int $numberMaximumPeople): void
    {
        $this->numberMaximumPeople = $numberMaximumPeople;
    }

    public function exceedsTheMaximumNumberOfPeople($numberPeople): boolean
    {
        return $this->numberMaximumPeople > $numberPeople;
    }
}
