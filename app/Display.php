<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Display extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'client_id', //foreign key จาก ตาราง clients
        'display_sapid',
        'display_pid',
        'display_size',
        'display_ratio',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function DisplayServer ()
    {
        return $this->belongsTo(Servers::class,'client_id');
    }
}
