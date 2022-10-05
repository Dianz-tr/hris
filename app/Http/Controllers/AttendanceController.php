<?php

namespace App\Http\Controllers;

use App\attendance;
use App\Izin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function index()
    {
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $cek_absen = Attendance::where(['user_id' => $user_id, 'date' => $date])
            ->get()
            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "hidden"
            );
        } elseif ($cek_absen->masuk != NULL) {
            $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "hidden",
                "btnOut" => ""
            );
            if ($cek_absen->keluar != NULL) {
                if ($cek_absen->production === NULL){
                    $tot = $cek_absen->keluar - $cek_absen->masuk;

                    $cek_absen->production = $tot;
                    $cek_absen->save();
                    return back();
                }
            }
        } else {
            $info = array(
                "status" => "Absensi hari ini telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled"
            );
        }
        $jumlahKehadiran = attendance::where('user_id', $user_id)->count();
        $today = Carbon::now();
        $tmonth = Carbon::now()->month;
        $attendances = Attendance::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->get();
        // Statistics Today
        $td_activi = Attendance::where('user_id', $user_id)->paginate(3);
        $static_today = Attendance::where(['user_id' => $user_id, 'date' => $date])
            ->sum('production');
        $percent_today = $static_today * 12.5;
        // Statistics Week
        $static_week = Attendance::where('user_id', $user_id)
            ->where('date', 'LIKE', '%', '>', Carbon::parse()->startOfWeek(Carbon::SUNDAY), '%')
            ->where('date', 'LIKE', '%', '<', Carbon::parse()->endOfWeek(Carbon::SATURDAY), '%')
            ->sum('production');
        $percent_week = $static_week * 2.5;
        // Statistics month
        $static_month = Attendance::where('user_id', $user_id)
            ->where('date', 'LIKE', '%' . $tmonth . '%')
            ->sum('production');
        $percent_month = $static_month * 0.625;
        // Statistics Remaining
        $static_remaining = 160 - $static_month;
        // dd($percent_month);
        return view('Employees.absensi.absen', compact(
            'attendances', 
            'info', 
            'td_activi', 
            'jumlahKehadiran', 
            'today', 
            'static_today',
            'static_week',
            'static_month',
            'static_remaining',
            'percent_today',
            'percent_week',
            'percent_month'
        ));
    }

    //
    public function attendance(Request $request)
    {
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $date = date('Y-m-d');
        $time = date("H:i:s");
        $note_out = ("Punch Out at");
        $status = "1";
        

        $attendance = new Attendance;

        // absen masuk
        if (isset($request->btnIn)) {
            //cek double data 
            $cek_double = $attendance->where(['date' => $date, 'user_id' => $user_id])
                ->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }

            $attendance->create([
                'name' => $name,
                'user_id' => $user_id,
                'date' => $date,
                'masuk' => $time,
            ]);
            return redirect()->back();
        }
        // absen keluar 
        elseif (isset($request->btnOut)) {
            $attendance->where(['date' => $date, 'user_id' => $user_id])
                ->update([
                    'keluar' => $time,
                    'note_out' => $note_out,
                    'status' => $status
                ]);

                // $attt = Attendance::select(['masuk' => , 'user_id' => $user_id])->get();
                // dd($attt);
            return redirect()->back();
        }
        // absen izin
        // elseif (isset($request->btnIzin)) {
        //     $izins = new Izin;

        //     $izins->create([
        //         'name' => $name,
        //         'date' => $date,
        //         'note' => $note,
        //     ]);

        //     $time = "00:00:00";
        //     $ts = strtotime($time);
        //     $attendance->create([
        //         'name' => "-",
        //         'user_id' => $user_id,
        //         'date' => $date,
        //         'masuk' => date("H:i:s", $ts),
        //         'note' => $note
        //     ]);
        //     return redirect()->back();
        // }
        return $request->all();
    }


    public function dataAbsen()
    {
        // $izins = Izin::all();
        $today = Carbon::now();
        $attendance = Attendance::get();
        $users = Attendance::select('name','status')->get()->groupBy('name');

        // dd($users);

        return view('Employees.absensi.dataAbsen', [
            'users' => $users,
            'attendance' => $attendance,
            'today' => $today
        ]);
        // compact('users', 'today'));
    }

    



    // public function masuk(){
    //     $attendance->
    //     'date' => $date,
    //     'masuk' => $time,
    //     $masuk = Attendance::where(['date' => '']) 
    // }
}
