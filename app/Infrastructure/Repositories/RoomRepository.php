<?php

namespace App\Infrastructure\Repositories;

use App\Domain\School\Room\IRoomRepository;
use App\Domain\School\Room\Room;
use App\Infrastructure\Models\RoomModel;
use Illuminate\Support\Facades\DB;

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
            if (!$roomModel) {
                throw new \Exception("Dont find room with id: ".$id);
            }
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
            RoomModel::where('id', $room->getId())
                ->update(['name' => $room->getName()]);
            return $room;
        } catch(\Exception $e) {
            throw new \Exception("Database error on update room. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            RoomModel::where('id', $id)->delete();
            return true;
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete room. ".$e->getMessage());
        }
    }

    public function list(string $name = null): array
    {
        try {
            $table = DB::table('rooms');
            if (!empty($name)) {
                $table->where('name', 'like', '%'.$name.'%');
            }
            $rooms = $table->get();
            return $this->map($rooms->toArray());
        } catch(\Exception $e) {
            throw new \Exception("Database error on list room. ".$e->getMessage());
        }
    }

    private function map(array $rooms): array
    {
        return array_map(function ($roomModel) {
            $room = new Room($roomModel->name, $roomModel->number_maximum_people);
            $room->setId($roomModel->id);
            return $room->toArray();
        }, $rooms);
    }
}
