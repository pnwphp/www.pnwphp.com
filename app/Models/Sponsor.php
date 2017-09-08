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

    public static function getActiveGroupedByTier()
    {
        return [
            'platinum' => Sponsor::where('level', 'platinum')
                ->where('active', true)
                ->get(),
            'gold' => Sponsor::where('level', 'gold')
                ->where('active', true)
                ->get(),
            'silver' => Sponsor::where('level', 'silver')
                ->where('active', true)
                ->get(),
            'bronze' => Sponsor::where('level', 'bronze')
                ->where('active', true)
                ->get(),
            'copper' => Sponsor::where('level', 'copper')
                ->where('active', true)
                ->get(),
            'community' => Sponsor::where('level', 'community')
                ->where('active', true)
                ->get(),
        ];
    }
}
