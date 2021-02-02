<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Clienttype extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'name',
        'client_id'
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function typeclients ()
    {
        return $this->hasMany(Client::class,'type_id');
    }
}
