<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   //column ที่สามารถเพิ่มและแก้ไขข้อมูล
   protected $fillable = [
      'id',
      'type',
      'sapid',
      'pid',
      'location_id',
      'is_mobile',
      'section',
      'user',
      'multi_user',
      'position',
      // 'section_status',
      'function',
      'owner',
      'tel_no',
      'permission',
      'asset_status',
      'asset_use_status',
      'remarks',
      'brand',
      'model',
      'serial_no',
      'cpu_model',
      'cpu_speed',
      'cpu_socket_number',
      'ram_size',
      'hdd_no',
      'data_unit',
      'hdd_total_cap',
      // 'display_no',
      'os',
      'os_arch',
      'ms_office_version',
      'antivirus',
      'pdf_reader',
      'ie_version',
      'chrome_version',
      'spss_version',
      'ehis',
      'sipacs',
      'si_iscan',
      'eclair',
      'admission_note',
      'ur_ward',
      'sinet',
      // 'other_software',
      'other_software_detail',
      'lan_outlet_no',
      'ip_address',
      'mac_address',
      'lan_type',
      'computer_name',
      'is_wireless',
      'issues',
   ];

   //แสดงความสัมพันธ์กับตาราง Display
   public function displays () 
   {
      return $this->hasMany(Display::class);
   }
   //แสดงความสัมพันธ์กับตาราง Section
   public function section ()
   {
      return $this->hasOne(Section::class);
   }
   //แสดงความสัมพันธ์กับตาราง Clienttype
   public function Clienttype ()
   {
      return $this->hasOne(Clienttype::class);
   }
   //แสดงความสัมพันธ์กับตาราง location
   public function location ()
   {
     return $this->hasOne(location::class);
   }
   //แสดงความสัมพันธ์กับตาราง Asset_statuses
   public function assetstatus ()
   {
     return $this->hasOne(Asset_statuses::class);
   }
   //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
   public function assetusestatus ()
   {
     return $this->hasOne(Asset_use_statuses::class);
   }
   //แสดงความสัมพันธ์กับตาราง NetworkConnection
   public function networkconnction ()
   {
      return $this->hasOne(NetworkConnection::class);
   }
}
