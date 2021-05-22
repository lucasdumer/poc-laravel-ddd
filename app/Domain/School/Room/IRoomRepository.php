<?php

namespace App\Domain\School\Room;

interface IRoomRepository
{
    public function create(Room $room): Room;
    public function find(int $id): Room;
    public function update(Room $room): Room;
    public function delete(int $id): boolean;
}
