<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Laravel\Scout\Searchable;

class Section extends Model
{
    // use Searchable;
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
       'id',
       'name',
   ];

    //แสดงความสัมพันธ์กับตาราง Client
    public function clientSection()
    {
        return $this->hasMany(Client::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function peripherals()
    {
        return $this->hasMany(Peripherals::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function storageperipherals()
    {
        return $this->hasMany(Storageperipherals::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function networkdevice()
    {
        return $this->hasMany(Networkdevices::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Servers
    public function server()
    {
        return $this->hasMany(Servers::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function networkedstorage()
    {
        return $this->hasMany(NetworkedStorage::class, 'section_id');
    }

    //แสดงความสัมพันธ์กับตาราง Upses
    public function SectionUpses()
    {
        return $this->hasMany(Upses::class, 'section_id');
    }

    //import ข้อมูลจากไฟล์ CSV
    public static function loadData($fileName)
    {
        $sectionRecords = loadCSV($fileName);
        foreach ($sectionRecords as $sectionRecord) {
            self::create($sectionRecord);
        }
    }
}
