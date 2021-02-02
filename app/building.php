<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Building extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name'
    ];

    public static function loadData($fileName){
        $buildingRecords = loadCSV($fileName);
        foreach($buildingRecords as $buildingRecord){
            Building::create($buildingRecord);
        }
    }
    public function BuildingLocation () {
        return $this->hasMany(Location::class,'building_id');
    }

}
