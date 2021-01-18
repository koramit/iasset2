<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> factory(App\Clienttype::class), //สุ่มค่า type_id
        'sapid' => rand(131100000000,131100099999), //สุ่มรหัส SAP
        'pid'=> '1224H001-S-7440-001-0001/64', //รหัสครุภัณฑ์
        'location_id'=> factory(App\Location::class), //ที่ตั้ง
        'mobility_id'=> factory(App\Mobility::class), //เคลื่อนที่ได้
        'section_id'=> factory(App\Section::class), //หน่วยงาน
        'user'=> $faker->name, //ผู้ใช้
        'position_id'=> factory(App\Position::class), //ตำแหน่ง
        'function_id'=>factory(App\Opsfunction::class), //ระบบงาน
        'owner_id'=>factory(App\Owner::class), //ที่มา
        'tel_no' => '9-9999', //หมายเลขโทรศัพท์
        'permission' => 1,//อำนาจ admin
        'asset_status_id'=>factory(App\Asset_statuses::class),//สถานะครุภัณฑ์
        'asset_use_status_id'=>factory(App\Asset_use_statuses::class),//สถานะการใช้งาน
        'remarks'=> 'TEST DATA NOT FOR PRODUCTION',//หมายเหตุ
        'brand'=> 'FELL', //ยี่ห้อ
        'model'=> 'Not-so-bright1', //รุ่น
        'serial_no'=>'test', //หมายเลขประจำเครื่อง
        'cpu_model' => 'Core i5-1025G7', //รุ่น CPU
        'cpu_speed' => 2.5, //ความเร็ว CPU
        'cpu_socket_number'=>1, //จำนวน socket cpu
        'ram_size'=> 8, //จำนวน RAM
        'hdd_no' => 1, //จำนวน HDD
        'data_unit_id'=> factory(App\DataUnit::class),
        'hdd_total_cap'=> 2, //ความจุ HDD
        'other_software_detail'=> '', //software อื่นๆ
        'lan_outlet_no' => '', //จุด LAN
        'ip_address' => $faker->localIpv4, //IP Address
        'mac_address'=> $faker->macAddress, //MAC Address
        'lan_type_id'=>'', //เชื่อมต่อเครือข่าย
        'computer_name'=>'computer', //ชื่อเครื่อง
        'is_wireless' => 0, //ใช้ wireless
        'issues' => 'test', //ปัญหาจำลอง
    ];
});
