<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinsController extends Controller
{
    //
    public function index()
    {
        $attendances = Attendance::all();
        $izins = Izin::all();
        return view('absensi.izin', [
            'izin' => $izins,
            'attendances' => $attendances
        ]);
    }
}
