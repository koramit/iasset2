<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Asset_statuses extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client()
    {
        return $this->hasMany(Client::class);
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function peripherals ()
    {
        return $this->hasMany(Peripherals::class,'asset_status');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function storageperipherals ()
    {
        return $this->hasMany(Storageperipherals::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function networkdevices ()
    {
        return $this->hasMany(Networkdevices::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function networkedstorage ()
    {
        return $this->hasMany(NetworkedStorage::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function servers ()
    {
        return $this->hasMany(Servers::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function AssetStatusUpses ()
    {
        return $this->hasMany(Upses::class,'asset_status_id');
    }
}
