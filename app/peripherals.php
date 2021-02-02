<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Peripherals extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มหรือแก้ไขข้อมูล
    protected $fillable =[
        'type_id',
        'id',
        'sapid',
        'pid',
        'location_id',
        'mobility_id',
        'multi_user_id',
        'user',
        'position_id',
        'section_id',
        'tel_no',
        'function',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'remarks',
        'brand',
        'model',
        'serial_no',
        'supply_consumables',
        'connectivity',
        'ip_address',
        'lan_outlet_no',
        'is_shared',
        'share_name',
        'share_method',
        'issues',
    ];
    //แสดงความสัมพันธ์กับตาราง Peripheraltype
    public function peripheraltype ()
    {
        return $this->belongsTo(Peripheraltype::class,'type_id');
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function peripheralsection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function PeripheralMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Multiuser
    public function PeripheralMultiUser ()
    {
        return $this->belongsTo(Multiuser::class,'multi_user_id');
    }
    //แสดงความสัมพันธ์กับตาราง Position
    public function PeripheralPosition ()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function peripheralowner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Location
    public function PeripheralRoom ()
    {
        return $this->belongsTo(Room::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function PeripheralAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function PeripheralAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }

}
