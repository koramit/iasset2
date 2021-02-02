<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class NetworkConnection extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->hasMany(Client::class,'lan_type_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function NetworkConnectionServer ()
    {
        return $this->hasMany(Servers::class,'lan_type_id');
    }

}
