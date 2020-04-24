<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Storageperipherals;
use App\Owner;
use App\Mobility;

class StorageperipheralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ใน controller 
    public function index()
    {
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

        //ตัวแปรที่ส่งกลับไปยังหน้า addstorageperipherals
        return view('addstorageperipherals')->with([
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
    //บันทึกข้อมูลที่ได้รับจากหน้า addstorageperipherals ผ่านตัวแปร request
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึกด้วย function validateData
        $Storagepheriperals = Storageperipherals::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //แจ้งผลการบันทึกข้อมูลกลับไปยังหน้าเดิม
        //return $request->all();
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

        $storageperipheral = Storageperipherals::find($id);

        return view('editstorageperipherals')->with([
            'storageperipheral'=>$storageperipheral,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateData($request);
        Storageperipherals::find($id)->update($request->all());
        return redirect('/storageperipheral');
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

    //function ตรวจสอบข้อมูล
    private function validateData($data)
    {
        //เงื่อนไข
        $rules = [
            'sapid'=>'nullable|regex:/^[0-9]{12}+$/',
            'pid'=>'nullable',
            'location_id' => 'required',
            'is_mobile' => 'required',
            'user' => 'required',
            'position' => 'required',
            'tel_no' => 'required',
            'owner' => 'required',
            'section' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'connectivity' => 'required',
            'data_unit'=>'required',
            'total_capacity' => 'required',
            'no_of_physical_drive_max' => 'required_if:is_hotswap,1|gte:2',
            'no_of_physical_drive_populated' => 'required_if:is_hotswap,1|lte:no_of_physical_drive_max',
            'lun_count' => 'required_if:is_hotswap,1',
        ];

        //ข้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.regex' => 'กรุณาตรวจสอบรหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'section.required' => 'กรุณาเลือกสาขา',
            'is_mobile.required' => 'กรุณาระบุลักษณะการใช้งาน',
            'user.required'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'position.required' => 'กรุณาระบุตำแแหน่งผู้ใช้งาน',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'owner.required' => 'กรุณาระบุที่มา',
            'asset_status.required'=>'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required'=>'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'connectivity.required' => 'กรณาลือกวิธีการเชื่อมต่อ',
            'data_unit.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'total_capacity.required' => 'กรุณาระบุความจุข้อมูล',
            'no_of_physical_drive_max.required_if'=> 'กรุณาระบุจำนวน disk ที่สามารถใส่ได้',
            'no_of_physical_drive_max.gte' => 'จำนวน disk ไม่เพียงพอ',
            'no_of_physical_drive_populated.required_if'=>'ใส่จำนวน disk ในเครื่อง',
            'no_of_physical_drive_populated.lte'=>'จำนวน disk ในเครื่องไม่ถูกต้อง',
            'lun_count.required_if'=>'ใส่จำนวน disk จำลอง',

        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้า addstorageperipherals หรือส่งข้อมูลไปบันทึก
    }
}
