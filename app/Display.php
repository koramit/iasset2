<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
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
        return $this->belongsTo(Client::class);
    }
}
