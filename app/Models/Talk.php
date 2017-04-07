<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable = [ 'name', 'desc', 'designation', 'category', 'level', 'start_time', 'end_time', 'day' ];

    public function speaker()
    {
        return $this->belongsTo('App\Models\Speaker');
    }
}
