@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ตารางบัญชีคอมพิวเตอร์</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/computer') }}"class="btn btn-primary btn-lg btn-block btn-danger" role="button">เพิ่มคอมพิวเตอร์</a>
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">SAP จอ</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">ระบบงาน</th>
                                <th scope="col">ลักษณะการติดตั้ง</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col">จำนวนผู้ใช้งาน</th>
                                <th scope="col">ผู้ใช้งาน</th>
                                <th scope="col">ตำแหน่งผู้ใช้งาน</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client['id'] }}</th>
                                    <td>{{ $client->ClientType->name }}</td>
                                    <td>{{ $client->ClientOwner->name }}</td>
                                    <td>{{ $client['sapid'] }}</td>
                                    <td>{{ $client['pid'] }}</td>
                                    <td>{{ $client->displays->first()->display_sapid}}</td>
                                    <td>{{ $client->clientSection->name }}</td>
                                    <td>{{ $client->ClientOpsFunction->name }}</td>
                                    <td>{{ $client->ClientMobility->name }}</td>
                                    <td>{{ $client->ClientAssetStatus->name }}</td>
                                    <td>{{ $client->ClientAssetUseStatus->name }}</td>
                                    <td>{{ $client->ClientMultiUser->name }}</td>
                                    <td>{{ $client['user'] }}</td>
                                    <td>{{ $client->ClientPosition->name }}</td>
                                    <td><a href="{{ url('/client',$client->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection