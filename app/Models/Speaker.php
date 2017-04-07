<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = ['name', 'image', 'desc'];

    public function talks()
    {
        return $this->hasMany('App\Models\Talk');
    }
}
