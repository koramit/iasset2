<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Multiuser extends Model
{
    // use Searchable;
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function MultiUserClient ()
    {
        return $this->hasMany(Client::class,'multi_user_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripheral
    public function MultiUserPeripheral ()
    {
        return $this->hasMany(Peripherals::class,'multi_user_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function MultiUserStoragePeripheral ()
    {
        return $this->hasMany(Storageperipherals::class,'multi_user_id');
    }
}
