<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peripherals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Peripherals
        Schema::create('peripherals', function (Blueprint $table){
            $table->bigincrements('id'); //ลำดับที่
            $table->integer('type'); //ชนิด รับค่าจากตาราง Peripheraltypes
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->boolean('is_mobile')->default(0); //เป็นเครื่องเคลื่อนที่
            $table->string('user'); //ชื่อผู้ใช้งาน
            $table->string('position'); //ตำแหน่งผู้ใช้งาน
            $table->integer('section'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('owner'); //เจ้าของ รับค่าจากตาราง Owner
            $table->integer('asset_status'); //สถานะทางทะเบียนครุภัณฑ์ รับค่าจากตาราง Asset_statuses 
            $table->integer('asset_use_status'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->string('remarks')->nullable(); //หมายเหตุ
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('supply_consumables'); //วัสดุสึกหรอสิ้นเปลือง
            $table->integer('connectivity'); //วิธีการเชื่อมต่อ
            $table->ipAddress('ip_address')->nullable(); //ip address
            $table->string('lan_outlet_no')->nullable(); //หมายเลขจุด LAN
            $table->boolean('is_shared')->default(0); //ใช้งานร่วมกัน
            $table->integer('share_method'); //วิธี share
            $table->string('share_name')->nullable(); //ชื่อที่ใช้ในการ share
            $table->string('issues')->nullable(); //ปัญหาในการใช้งาน
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifexists('peripherals');
    }
}
