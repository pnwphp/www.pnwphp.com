<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getSimpleArray()
    {
        $records = $this::all();
        $simpleArray = [];
        foreach ($records as $record) {
            $simpleArray[$record['id']] = $record['name'];
        }
        return $simpleArray;
    }
}
