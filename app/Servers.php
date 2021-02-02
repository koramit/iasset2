<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Servers extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'section_id',
        'mobility_id',
        'tel_no',
        'response_person',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'serial_no',
        'form_factor_id',
        'cpu_model',
        'cpu_speed',
        'cpu_socket_no',
        'ram_size',
        'is_raid',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'data_unit_id',
        'hdd_total_cap',
        'os_id',
        'os_arch_id',
        'role_class_id',
        'is_ad',
        'is_dns',
        'is_dhcp',
        'is_fileshare',
        'is_web',
        'is_db',
        'is_log',
        'other_software',
        'other_software_detail',
        'lan_type_id',
        'lan_outlet_no',
        'ip_address',
        'mac_address',
        'computer_name',
        'issues',
        'remarks',
    ];

    //แสดงความสัมพันธ์กับตาราง room
    public function ServerRoom()
    {
        return $this->belongsTo(Room::class, 'location_id');
    }

    //แสดงความสัมพันธ์กับตาราง Section
    public function ServerSection()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Mobility
    public function ServerMobility()
    {
        return $this->belongsTo(Mobility::class, 'mobility_id');
    }

    //แสดงความสัมพันธ์กับตาราง Owner
    public function ServerOwner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function ServerAssetStatus()
    {
        return $this->belongsTo(Asset_statuses::class, 'asset_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function ServerAssetUseStatus()
    {
        return $this->belongsTo(Asset_use_statuses::class, 'asset_use_status_id');
    }

    //แสดงความสัมพันธ์กับตาราง Formfactor
    public function ServerFormFactor()
    {
        return $this->belongsTo(Formfactor::class, 'form_factor_id');
    }

    public function ServerDisplay()
    {
        return $this->hasMany(Display::class, 'client_id');
    }

    //แสดงความสัมพันธ์กับตาราง DataUnit
    public function ServerDataUnit()
    {
        return $this->belongsTo(DataUnit::class, 'data_unit_id');
    }

    //แสดงความสัมพันธ์กับตาราง ServerRoleClass
    public function ServerRoleClass()
    {
        return $this->belongsTo(ServerRoleClass::class, 'role_class_id');
    }

    //แสดงความสัมพันธ์กับตาราง ServerOS
    public function ServerOs()
    {
        return $this->belongsTo(ServerOp::class, 'os_id');
    }

    //แสดงความสัมพันธ์กับตาราง OsArch
    public function ServerOsArch()
    {
        return $this->belongsTo(OsArch::class, 'os_arch_id');
    }

    //แสดงความสัมพันธ์กับตาราง NetworkConnection
    public function ServerNetworkConnection()
    {
        return $this->belongsTo(NetworkConnection::class, 'lan_type_id');
    }
}
