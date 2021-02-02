<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Location extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'building_id',
        'floor',
        'wing'
    ];
    //import ข้อมูล location จาก file CSV
    public static function loadData($fileName){
        $locationRecords = loadCSV($fileName);
        foreach($locationRecords as $locationRecord){
            Location::create($locationRecord);
        }
    }
    //แสดงความสัมพันธ์กับตาราง Building
    public function building() {
        return $this->belongsTo(Building::class,'building_id');
    }
    //แสดงความสัมพันธ์กับตาราง Room
    public function LocationRoom ()
    {
        return $this->hasMany(Room::class,'location_id');
    }
}
