<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = "students";

    protected $primaryKey = 'id';
}
