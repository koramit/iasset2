<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Owner extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->hasMany(Client::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function peripherals ()
    {
        return $this->hasMany(Peripherals::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function storageperipherals ()
    {
        return $this->hasMany(Storageperipherals::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function networkdevice ()
    {
        return $this->hasMany(Networkdevices::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function server ()
    {
        return $this->belongsTo(Servers::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function networkedstorage ()
    {
        return $this->hasMany(NetworkedStorage::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function OwnerUpses ()
    {
        return $this->hasMany(Upses::class,'owner_id');
    }
}
