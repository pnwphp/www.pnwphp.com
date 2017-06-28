<?php namespace App\Models;

class Event extends BaseModel
{
	use API\DateFixer;
    protected $fillable = [ 'name', 'desc', 'start_time', 'end_time', 'day', 'location' ];
}
