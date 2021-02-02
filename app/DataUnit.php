<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class DataUnit extends Model
{
    // use Searchable;
    //column ที่แก้ไขข้อมูลได้
    protected $fillable =[
    'id',
    'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function DataUnitClient()
    {
        return $this->hasMany(Client::class,'data_unit_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function DataUnitStoragePeripherals()
    {
        return $this->hasMany(Storageperipherals::class,'data_unit_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function DataUnitNetworkedStorage()
    {
        return $this->hasMany(NetworkedStorage::class,'data_unit_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function DataUnitServer ()
    {
        return $this->hasMany(Servers::class,'data_unit_id');
    }
}
