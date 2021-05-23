<?php

namespace App\Domain\School\Room;

interface IRoomService
{
    public function create(IRoomCreateCommand $roomCreateCommand): Room;
    public function find(int $id): Room;
    public function update(IRoomUpdateCommand $roomUpdateCommand): Room;
    public function delete(int $id): bool;
    public function list(string $name = null): array;
}
