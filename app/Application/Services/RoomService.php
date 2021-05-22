<?php

namespace App\Application\Services;

use App\Domain\School\Room\IRoomCreateCommand;
use App\Domain\School\Room\IRoomService;
use App\Domain\School\Room\IRoomUpdateCommand;
use App\Domain\School\Room\Room;
use App\Infrastructure\Repositories\RoomRepository;

class RoomService implements IRoomService
{
    public function __construct(
        private RoomRepository $roomRepository
    ) {}

    public function create(IRoomCreateCommand $roomCreateCommand): Room
    {
        try {
            $room = new Room($roomCreateCommand->getName(), $roomCreateCommand->getNumberMaximumPeople());
            return $this->roomRepository->create($room);
        } catch(\Exception $e) {
            throw new \Exception("Service error on creating room. ".$e->getMessage());
        }
    }

    public function find(int $id): Room
    {
        try {
            return $this->roomRepository->find($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on find room. ".$e->getMessage());
        }
    }

    public function update(IRoomUpdateCommand $roomUpdateCommand): Room
    {

    }

    public function delete(int $id): bool
    {

    }
}
