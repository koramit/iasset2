<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Networkdevices extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'mobility_id',
        'section_id',
        'tel_no',
        'response_person',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'device_subtype_id',
        'brand',
        'model',
        'serial_no',
        'port_count',
        'is_modular',
        'psu_count',
        'device_management_address',
        'software_version',
        'issues',
        'remarks',
    ];
    //แสดงความสัมพันธ์กับตาราง Location
    public function NetworkDeviceRoom ()
    {
        return $this->belongsTo(Room::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function NetworkDeviceSection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function NetworkDeviceOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function NetworkDeviceMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function NetworkDeviceAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function NetworkDeviceAssetUseStatus()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetSubtype
    public function netsubtype ()
    {
        return $this->belongsTo(NetSubtype::class,'device_subtype_id');
    }
}
