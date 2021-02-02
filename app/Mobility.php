<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Mobility extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function MobilityClient ()
    {
        return $this->hasMany(Client::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function MobilityPeripherals ()
    {
        return $this->hasMany(Peripherals::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function MobilityStoragePeripherals ()
    {
        return $this->hasMany(Storageperipherals::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function MobilityNetworkdevice ()
    {
        return $this->hasMany(Networkdevices::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function MobilityServer ()
    {
        $this->hasMany(Servers::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function MobilityNetworkedstorage ()
    {
        return $this->hasMany(NetworkedStorage::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function MobilityUps ()
    {
        return $this->hasMany(Upses::class,'mobility_id');
    }
}
