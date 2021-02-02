<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Upsbatterytype extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];

    //แสดงความสัมพันธ์กับตาราง Upses
    public function BatteryTypeUps()
    {
        return $this->hasMany(Upses::class, 'battery_type_id');
    }
}
