<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Room\IRoomRepository;
use App\Domain\School\Room\Room;
use App\Infrastructure\Models\RoomModel;

class RoomRepository implements IRoomRepository
{
    public function create(Room $room): Room
    {
        try {
            $roomModel = new RoomModel();
            $roomModel->name = $room->getName();
            $roomModel->number_maximum_people = $room->getNumberMaximumPeople();
            $roomModel->save();
            $room->setId($roomModel->id);
            return $room;
        } catch(\Exception $e) {
            throw new \Exception("Database error on creating room. ".$e->getMessage());
        }
    }

    public function find(int $id): Room
    {
        try {
            $roomModel = RoomModel::find($id);
            $room = new Room($roomModel->name, $roomModel->number_maximum_people);
            $room->setId($roomModel->id);
            return $room;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find room. ".$e->getMessage());
        }
    }

    public function update(Room $room): Room
    {
        try {

        } catch(\Exception $e) {
            throw new \Exception("Database error on update room. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {

        } catch(\Exception $e) {
            throw new \Exception("Database error on delete room. ".$e->getMessage());
        }
    }
}
