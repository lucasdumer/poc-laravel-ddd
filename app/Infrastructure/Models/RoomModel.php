<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = "rooms";

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $appends = ['numberMaximumPeople'];

    protected $hidden = ['number_maximum_people'];

    public function getNumberMaximumPeopleAttribute()
    {
        return $this->attributes['number_maximum_people'];
    }
}
