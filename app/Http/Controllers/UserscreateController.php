<?php

namespace App\Http\Controllers;

use App\Client;
use App\Designation;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserscreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        $client = Client::all();
        $user = User::all();
        // dd($employee);
        return view('Users.index', compact('employee', 'user', 'client'));
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
        // dd($request);

        $this->validate($request, [
            'id_employ' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->employee_id = $request->get('id_employ');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = $request->get('role');
        // dd($user);
        $user->save();

        Session::flash('success', 'Data user created');
        return redirect()->back();
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

    public function showdata(Request $request)
    {
        $id = $request->id;
        $data = Employee::where('employee_id', $id)
            ->get();
        // $data = Client::where('id_client', $id)->get();
        return response()->json($data);
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
        $user = User::find($id);
        $user->role = $request->get('role');
        $user->save();

        Session::flash('success', 'Data user updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        
        Session::flash('success','Employee deleted');
        return redirect()->back();
    }
    public function reportsindex()
    {
        //     if($request){
        //         $user = User::with('Employee')->where('role','like','%'.$request->cari.'%')->get();
        //     }
        //     else{
        //         $user = User::with('Employee')->get();
        //     }
        $employee = Employee::all();
        $client = Client::all();
        $user = User::all();
        $designation = Designation::get();

        return view('Reports.user-reports.index', compact('employee', 'user', 'client', 'designation'));
    }

    // public function search(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$search = $request->search;
 
    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$user = DB::table('user')
	// 	->where('role','like',"%".$search."%")
	// 	->paginate();
 
    // 		// mengirim data pegawai ke view index
	// 	return view('Reports.user-reports.index',['user' => $user]);
 
	// }
}
