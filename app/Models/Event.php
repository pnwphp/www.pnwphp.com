<?php namespace App\Models;

use App\Models\Api\DateFixer;

class Event extends BaseModel implements HasStartTime
{
	use DateFixer;
    protected $fillable = [ 'name', 'desc', 'start_time', 'end_time', 'day', 'location' ];
}
