<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendedModel extends Model
{
    protected $table = 'attended';
    protected $primaryKey = 'attended_id';
}
