<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Upses extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'mobility_id',
        'response_person',
        'section_id',
        'tel_no',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'serial_no',
        'form_factor_id',
        'topology_id',
        'capacity',
        'is_modular',
        'battery_type_id',
        'has_external_battery',
        'device_management_address',
        'issues',
        'remarks',
    ];

    //แสดงความสัมพันธ์กับตาราง Room
    public function UpsRoom()
    {
        return $this->belongsTo(Room::class, 'location_id');
    }

    //แสดงความสัมพันธ์กับตาราง Section
    public function UpsSection()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Mobility
    public function UpsMobility()
    {
        return $this->belongsTo(Mobility::class, 'mobility_id');
    }

    //แสดงความสัมพันธ์กับตาราง Owner
    public function UpsOwner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function UpsAssetStatus()
    {
        return $this->belongsTo(Asset_statuses::class, 'asset_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function UpsAssetUseStatus()
    {
        return $this->belongsTo(Asset_use_statuses::class, 'asset_use_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง Formfactor
    public function UpsFormFactor()
    {
        return $this->belongsTo(Formfactor::class, 'form_factor_id');
    }

    //แสดงความสัมพันธ์กับตาราง Topology
    public function UpsTopology()
    {
        return $this->belongsTo(Topology::class, 'topology_id');
    }

    //แสดงความสัมพันธ์กับตาราง Upsbatterytype
    public function UpsBatteryType()
    {
        return $this->belongsTo(Upsbatterytype::class, 'battery_type_id');
    }
}
