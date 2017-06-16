<?php namespace App\Models;

class Speaker extends BaseModel
{
    protected $fillable = ['name', 'image', 'desc'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function talks()
    {
        return $this->belongsToMany('App\Models\Talk');
    }
}
