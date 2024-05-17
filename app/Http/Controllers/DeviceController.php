<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'mac' => 'required',
        ]);
        Devices::create([
        'mac' => $request->mac,
        ]);
        session()->flash('success', 'Add Devices Successfully!');
        return redirect()->back();
    }
    public function devices()
    {
        $devices = DB::table('devices')->orderBy('mac')->get();;
        $jsonData = [
        'devices' => $devices,
        ];
        return view('laravel-examples/devices-management', $jsonData);
    }
}
