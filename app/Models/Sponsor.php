<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['name', 'image', 'desc', 'level', 'contact', 'email', 'phone', 'website', 'active'];

    protected $attributes = [
        'image' => "images/sponsors/pic04.jpg",
        'desc' => "",
        'active' => false
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function getActive()
    {
        $records = $this::where('active', true)->get();
        $simpleArray = [];
        foreach ($records as $record) {
            $simpleArray[$record['id']] = $record['name'];
        }
        return $simpleArray;
    }

    public function getPending()
    {
        $records = $this::where('active', false)->get();
        $simpleArray = [];
        foreach ($records as $record) {
            $simpleArray[$record['id']] = $record['name'];
        }
        return $simpleArray;
    }
}
