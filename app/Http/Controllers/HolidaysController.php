<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::All();
        return view('Employees.holidays.index', [
            'holidays' => $holidays
        ]);
    }

    public function dataHolidays()
    {
        $holidays = Holiday::all();
        return $holidays;
    }

    public function insertHolidays(Request $request)
    {
        $data = $request->all();
        $holidays = new Holiday($data);
        $holidays->save();

        $status = 400;
        $message = "Gagal menyimpan data-Projects!";

        if ($holidays) {
            $status = 200;
            $message = "Berhasil menyimpan data-Projects!";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $holidays
        ]);
    }

    public function editHolidays($id)
    {
        $holidays = Holiday::find($id);
        return $holidays;
    }

    public function updateHolidays(Request $request, $id)
    {
        $holidays = Holiday::find($id);
        $holidays->update($request->all());
        $holidays->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $holidays]);
    }

    public function deleteHolidays($id)
    {
        $holidays = Holiday::find($id);
        $holidays->delete();

        return response()->json();
    }
}
