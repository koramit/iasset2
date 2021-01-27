<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Storageperipherals;
use App\Owner;
use App\Mobility;

class StorageperipheralsIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ตัวแปรที่ใช้ในการแสดงบัญชีอุปกรณต่อพ่วงเก็บข้อมูล
        $Asset_statuses=Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits = array(
            ['id' => '1', 'name' => 'GB'],
            ['id' => '2', 'name' => 'TB'],
        );
        $Owners= Owner::all();
        $Connectivity = array(
            ['id' => '1', 'name' => 'USB'],
            ['id' => '2', 'name' => 'eSATA'],
            ['id' => '3', 'name' => 'SAS'],
        );
        $Mobility = Mobility::all();
        $storageperipherals = Storageperipherals::all();
        foreach ($storageperipherals as $storageperipheral) //เปลี่ยนวันที่แก้ไขข้อมูลให้เป็น ว-ด-ป 
        {
            $storageperipheral->update_date = $storageperipheral->updated_at->format('d-m-Y');
        }

        //ตัวแปรที่ส่งกลับไปยังหน้า StorageperipheralsIndex
        return view('StorageperipheralsIndex')->with([
            'storageperipherals'=>$storageperipherals,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'connectivities'=>$Connectivity,
            'mobiles'=>$Mobility,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
