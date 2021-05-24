<?php

namespace App\Domain\School\Team;

use App\Domain\School\Course\Course;
use App\Domain\School\Room\Room;

class Team
{
    private int $id;

    public function __construct(
        private Course $course,
        private Room $room,
        private Period $period,
        private string $shift
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }

    public function setCourse(Course $course): void
    {
        $this->course = $course;
    }

    public function getRoom(): Room
    {
        return $this->room;
    }

    public function setRoom(Room $room): void
    {
        $this->room = $room;
    }

    public function getPeriod(): Period
    {
        return $this->period;
    }

    public function setPeriod(Period $period): void
    {
        $this->period = $period;
    }

    public function getShift(): string
    {
        return $this->shift;
    }

    public function setShift(string $shift): void
    {
        $this->shift = $shift;
    }
}
