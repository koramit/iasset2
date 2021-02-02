<?php

namespace App\Http\Controllers;

use App\Client;
use App\Networkdevices;
use App\NetworkedStorage;
use App\Peripherals;
use App\room;
use App\Servers;
use App\Storageperipherals;
use App\Upses;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Searchclass = [
        //     ['id'=>'1', 'name'=>'Client', 'ui_name'=>'คอมพิวเตอร์'],
        //     ['id'=>'2', 'name'=>'Display', 'ui_name'=>'จอภาพ'],
        //     ['id'=>'3', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
        //     ['id'=>'4', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
        //     ['id'=>'5', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
        //     ['id'=>'6', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
        //     ['id'=>'7', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
        //     ['id'=>'8', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
        // ];
        // $Rooms = Room::all();

        // return view('index')->with([
        //     'searches'=>$Searchclass,
        //     'rooms'=>$Rooms,
        // ]);

        // $Rooms = Room::all();

        return view('index')->with([
            'searches' => [
                ['id'=>'1', 'name'=>'Client', 'ui_name'=>'คอมพิวเตอร์'],
                ['id'=>'2', 'name'=>'Display', 'ui_name'=>'จอภาพ'],
                ['id'=>'3', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
                ['id'=>'4', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
                ['id'=>'5', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
                ['id'=>'6', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
                ['id'=>'7', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
                ['id'=>'8', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
            ],
            'rooms' => Room::all(),
            'results' => $this->searchEquipment(request()->search_class, request()->search_column),
        ]);
    }

    protected function searchEquipment($class, $column)
    {
        if (! $class || ! $column) {
            return null;
        }

        $equipmentsClass = [
            '',
            '\App\client',
            '\App\Display',
            '\App\Peripherals',
            '\App\storageperipherals',
            '\App\Servers',
            '\App\NetworkedStorage',
            '\App\Networkdevices',
            '\App\Upses',
        ];

        $modelClass = $equipmentsClass[$class];

        return $modelClass::select('id', 'sapid', 'pid')
                     ->where('location_id', $column)
                     ->paginate(5)
                     ->withQueryString(['search_class' => $class, 'search_column' => $column]);
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

    public function search(Request $request)
    {
        $this->validateQuery($request);
        //$Results=Client::where('sapid', $request->search)->get();
        //ทำการค้นหาข้อมูล
        if ($request->search_class == 1) {
            $Searchclass = [
                ['id'=>'1', 'name'=>'Client', 'ui_name'=>'คอมพิวเตอร์'],
                ['id'=>'2', 'name'=>'Display', 'ui_name'=>'จอภาพ'],
                ['id'=>'3', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
                ['id'=>'4', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
                ['id'=>'5', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
                ['id'=>'6', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
                ['id'=>'7', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
                ['id'=>'8', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
            ];
            $Rooms = Room::all();
            \Log::info($request->all());
            $Results = Client::search($request->keyword)->orderBy('id', 'asc')->paginate(10); //ค้นหาเครื่องคอมพิวเตอร์
            \Log::info($Results);
            // return view('results')->with([
            //     'results'=>$Results,
            // ]);
            return view('index')->with([
                'results'=>$Results,
                'searches'=>$Searchclass,
                'rooms'=>$Rooms,
            ]);
        }
        if ($request->search_class == 2) {
            $Results = Display::search($request->keyword)->paginate($request->per_page); //ค้นหาจอภาพ

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 3) {
            $Results = Peripherals::search($request->keyword)->paginate($request->per_page); //ค้นหาอุปกรณ์ต่อพ่วง

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 4) {
            $Results = Storageperipherals::search($request->keyword)->paginate($request->per_page); //ค้นหาอุปกรณ์ต่อพ่วงเก็บข้อมูล

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 5) {
            $Results = Servers::search($request->keyword)->paginate($request->per_page); //ค้นหาเครื่องคอมพิวเตอร์แม่ข่าย

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 6) {
            $Results = NetworkedStorage::search($request->keyword)->paginate($request->per_page); //ค้นหาอุปกรณ์เก็บข้อมูลเครือข่าย

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 7) {
            $Results = Networkdevices::search($request->keyword)->paginate($request->per_page); //ค้นหาอุปกรณ์เครือข่าย

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        if ($request->search_class == 8) {
            $Results = Upses::search($request->keyword)->paginate($request->per_page); //ค้นหาเครื่องสำรองไฟฟ้า

            return view('results')->with([
                'results'=>$Results,
            ]);
        }
        // return view('results')->with([
        //     'results'=>$Results,
        // ]);
    }

    private function validateQuery($data) //ตรวจสอบคำค้นหา
    {
        $rules = [
            'search_class' => 'required',
        ];

        $messages = [
            'search_class.required' => 'require',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
