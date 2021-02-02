<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class storageperipherals extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'mobility_id',
        'section_id',
        'multi_user_id',
        'user',
        'position_id',
        'tel_no',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'remarks',
        'brand',
        'model',
        'serial_no',
        'connectivity',
        'is_hotswap',
        'data_unit_id',
        'total_capacity',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'issues',
    ];

    //แสดงความสัมพันธ์กับตาราง Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Mobility
    public function StorageperipheralMobility()
    {
        return $this->belongsTo(Mobility::class, 'mobility_id');
    }

    //แสดงความสัมพันธ์กับตาราง Multiuser
    public function StoragePeripheralMultiUser()
    {
        return $this->belongsTo(Multiuser::class, 'multi_user_id');
    }

    //แสดงความสัมพันธ์กับตาราง Room
    public function StoragePeripheralRoom()
    {
        return $this->belongsTo(Room::class, 'location_id');
    }

    //แสดงความสัมพันธ์กับตาราง Position
    public function StoragePeripheralPosition()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    //แสดงความสัมพันธ์กับตาราง Owner
    public function StoragePeripheralOwner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function StoragePeripheralAssetStatus()
    {
        return $this->belongsTo(Asset_statuses::class, 'asset_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function StoragePeripheralAssetUseStatus()
    {
        return $this->belongsTo(Asset_use_statuses::class, 'asset_use_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง DataUnit
    public function StoragePeripheralDataUnit()
    {
        return $this->belongsTo(DataUnit::class, 'data_unit_id');
    }
}
