<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Position extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];

    //แสดงความสัมพันธ์กับตาราง Client
    public function PositionClient ()
    {
        return $this->hasMany(Client::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripheral
    public function PositionPeripheral ()
    {
        return $this->hasMany(Peripherals::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipheral
    public function PositionStoragePeripherals ()
    {
        return $this->hasMany(Storageperipherals::class,'position_id');
    }
}
