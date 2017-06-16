<?php namespace App\Models;

class Event extends BaseModel
{
    protected $fillable = [ 'name', 'desc', 'start_time', 'end_time', 'day', 'location' ];
}
