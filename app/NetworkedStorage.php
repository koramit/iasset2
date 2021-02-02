<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class NetworkedStorage extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
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
        'storage_type_id',
        'brand',
        'model',
        'serial_no',
        'data_unit_id',
        'hdd_total_cap',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'device_name',
        'device_management_address',
        'device_communication_address',
        'is_smb',
        'is_fc',
        'is_iscsi',
        'remarks',
        'issues',
    ];
    //แสดงความสัมพันธ์กับตาราง Location
    public function NetworkedStorageRoom ()
    {
        return $this->belongsTo(Room::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function NetworkedStorageSection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function NetworkedStorageMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function NetworkedStorageOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function NetworkedStorageAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function NetworkedStorageAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
    //แสดงความสับพันธ์กับตาราง Networkstoragetype
    public function NetworkedStorageType ()
    {
        return $this->belongsTo(Networkedstoragetype::class,'storage_type_id');
    }
    //แสดงความสัมพันธ์กับตาราง DataUnit
    public function NetworkedStorageDataUnit ()
    {
        return $this->belongsTo(DataUnit::class,'data_unit_id');
    }
}
