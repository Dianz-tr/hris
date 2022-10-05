<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\User;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employee = Employee::where('users_id', Auth::user()->id)->first();
        if(!$employee)
        {
            $employee = new Employee();
            $employee->users_id = Auth::user()->id;
            $employee->save();
        }

        $user = User::find(Auth::user()->id);
        $role = Role::all();
        return view('user_mgmt.profile.index', 
            compact('user', 'employee', 'role')
        );
    }
    
    public function uploadProfileImage(Request $request, $users_id)
    {
        
        // $assets = Asset::find($id);
        // $imageOld = $assets->image;

        $folderPath = public_path('image/profiles/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);
        
        $saveFile = Employee::findOrFail($users_id);
        $saveFile->profil_image = $imageName;
        // $saveFile->users_id = Auth::user()->id;
        $saveFile->save();
        // ngecek kosong, 
        // save,
        // user table == auth
        // update

        // if ($saveFile::where('users_id',Auth::user()->id) == null){
        // }
        // elseif ($saveFile->users == Auth::user()->id) {
        //     $saveFile->profil_image = $imageName;
        //     $saveFile->users_id = Auth::user()->id;
        //     $saveFile->update();
        // } 
        
        // $saveFile->profil_image = $imageName;
        // $saveFile->users_id = Auth::user()->id;
        // $saveFile->save();
    
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
        // return back()
        //     ->with('success','You have successfully upload image.');
    }

    public function updateProfile(Request $request, $users)
    {
        // $request = request()->get('Request');
        $akun = Employee::findOrFail($users);
        $akun->name = $request->get('name');
        $akun->birth = $request->get('birth');
        $akun->gender = $request->get('gender');
        $akun->address = $request->get('address');
        $akun->state = $request->get('state');
        $akun->country = $request->get('country');
        $akun->phone = $request->get('phone');
        $akun->religion = $request->get('religion');
        $akun->save();

        return back()->with('success','Post deleted successfully');
    }
    
}
