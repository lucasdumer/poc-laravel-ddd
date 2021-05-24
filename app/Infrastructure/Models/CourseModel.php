<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = "courses";

    protected $primaryKey = 'id';

    public $timestamps = false;
}
