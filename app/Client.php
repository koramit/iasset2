<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Client extends Model
{
   // use Searchable;
   //column ที่สามารถเพิ่มและแก้ไขข้อมูล
   protected $fillable = [
      'id',
      'type_id',
      'sapid',
      'pid',
      'location_id',
      'mobility_id',
      'section_id',
      'user',
      'multi_user_id',
      'position_id',
      // 'section_status',
      'function_id',
      'owner_id',
      'tel_no',
      'permission',
      'asset_status_id',
      'asset_use_status_id',
      'remarks',
      'brand',
      'model',
      'serial_no',
      'cpu_model',
      'cpu_speed',
      'cpu_socket_number',
      'ram_size',
      'hdd_no',
      'data_unit_id',
      'hdd_total_cap',
      // 'display_no',
      'os',
      'os_arch_id',
      'ms_office_version',
      'antivirus',
      'pdf_reader',
      'endnote_version',
      'ie_version',
      'firefox_version',
      'chrome_version',
      'spss_version',
      'ehis',
      'sipacs',
      'si_iscan',
      'eclair',
      'admission_note',
      'ur_ward',
      'sinet',
      'zoom',
      'webex',
      // 'other_software',
      'other_software_detail',
      'lan_outlet_no',
      'ip_address',
      'mac_address',
      'lan_type_id',
      'computer_name',
      'is_wireless',
      'issues',
   ];

   //แสดงความสัมพันธ์กับตาราง Display
   public function displays ()
   {
      return $this->hasMany(Display::class,'client_id');
   }
   //แสดงความสัมพันธ์กับตาราง Section
   public function clientsection ()
   {
      return $this->belongsTo(Section::class,'section_id');
   }
   //แสดงความสัมพันธ์กับตาราง Clienttype
   public function ClientType ()
   {
      return $this->belongsTo(Clienttype::class,'type_id');
   }
   //แสดงความสัมพันธ์กับตาราง Opsfunction
   public function ClientOpsFunction ()
   {
      return $this->belongsTo(Opsfunction::class,'function_id');
   }
   //แสดงความสัมพันธ์กับตาราง location
   public function ClientRoom ()
   {
     return $this->belongsTo(Room::class,'location_id');
   }
   //แสดงความสัมพันธ์กับตาราง Owner
   public function ClientOwner ()
   {
      return $this->belongsTo(Owner::class,'owner_id');
   }
   public function ClientMobility ()
   {
      return $this->belongsTo(Mobility::class,'mobility_id');
   }
   //แสดงความสัมพันธ์กับตาราง Position
   public function ClientPosition ()
   {
      return $this->belongsTo(Position::class,'position_id');
   }
   //แสดงความสัมพันธ์กับตาราง Multiuser
   public function ClientMultiUser ()
   {
      return $this->belongsTo(Multiuser::class,'multi_user_id');
   }
   //แสดงความสัมพันธ์กับตาราง Asset_statuses
   public function ClientAssetStatus ()
   {
     return $this->belongsTo(Asset_statuses::class,'asset_status_id');
   }
   //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
   public function ClientAssetUseStatus ()
   {
     return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
   }
   //แสดงความสัมพันธ์กับตาราง DataUnit
   public function ClientDataUnit ()
   {
      return $this->belongsTo(DataUnit::class,'data_unit_id');
   }
   //แสดงความสัมพันธ์กับตาราง OsArch
   public function ClientOsArch ()
   {
      return $this->belongsTo(OsArch::class,'os_arch_id');
   }
   //แสดงความสัมพันธ์กับตาราง NetworkConnection
   public function networkconnection ()
   {
      return $this->belongsTo(NetworkConnection::class,'lan_type_id');
   }
   public function PermissionName ()
   {
      switch ($client->permission) {
         case '0':
            return 'ไม่มี';
            break;

         case '1':
            return 'มี';
            break;

         default:
            return 'ไม่ทราบ';
            break;
      }
   }
}
