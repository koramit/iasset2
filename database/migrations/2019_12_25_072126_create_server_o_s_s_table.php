<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ServerOS;

class CreateServerOSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง ServerOS
        Schema::create('server_o_s_s', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อ OS
            $table->timestamps();
        });
        //กำหนดชื่อ OS
        $server_oses = array(
            ['name'=>'Windows Server 2003'],
            ['name'=>'Windows Server 2008'],
            ['name'=>'Windows Server 2012'],
            ['name'=>'Windows Server 2016'],
            ['name'=>'Windows Server 2019'],
            ['name'=>'Ubuntu Server'],
        );
        //เขียนข้อมูลลงฐานข้อมูล
        foreach($server_oses as $server_os){
            ServerOS::create($server_os);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_o_s_s');
    }
}
