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
        try {
            $room = $this->find($roomUpdateCommand->getId());
            $room->setName($roomUpdateCommand->getName());
            return $this->roomRepository->update($room);
        } catch(\Exception $e) {
            throw new \Exception("Service error on update room. ".$e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->roomRepository->delete($id);
        } catch(\Exception $e) {
            throw new \Exception("Service error on delete room. ".$e->getMessage());
        }
    }

    public function list(string $name = null): array
    {
        try {
            return $this->roomRepository->list($name);
        } catch(\Exception $e) {
            throw new \Exception("Service error on list room. ".$e->getMessage());
        }
    }
}
