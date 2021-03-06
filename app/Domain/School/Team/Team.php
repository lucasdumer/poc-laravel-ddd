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
    )
    {
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

    private function validate(): void
    {
        if ($this->shift != 'morning' && $this->shift != 'evening' && $this->shift != 'night' ) {
            throw new \Exception("Shift invalid.");
        }
    }

    public function update(
        Course $course,
        Room $room,
        Period $period,
        string $shift
    ): void {
        $this->course = $course;
        $this->room = $room;
        $this->period = $period;
        $this->shift = $shift;
        $this->validate();
    }

    public function checkPeriods(array $teams, Period $period, string $shift): void
    {
        foreach($teams as $team) {
            if (
                !($period->getEnd() < $team->getPeriod()->getStart() || $period->getStart() > $team->getPeriod()->getEnd()) &&
                $team->getShift() == $shift
            ) {
                throw new \Exception("There is already a class in the range.");
            }
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course->getId(),
            'room_id' => $this->room->getId(),
            'start' => $this->period->getStart()->format('Y-m-d'),
            'end' => $this->period->getEnd()->format('Y-m-d'),
            'shift' => $this->shift,
        ];
    }
}
