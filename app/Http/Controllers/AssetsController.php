<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use App\Asset;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssetsController extends Controller
{
    //  
    public function index(Request $request)
    {

        $assets = Asset::all();
        $users = User::all();
        return view('dtassets.index', [
            'assets' => $assets,
            'users' => $users
        ]);
    }


    public function create(Request $request)
    {
        $users = User::all();
        return view('dtassets.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $assets = new Asset();

        $asset_id = IdGenerator::generate(['table' => 'tbl_clients', 'length' => 7, 'prefix' => date('hms')]);

        $assets->asset_user = $request->asset_user;
        $assets->asset_id = '#AST-' . $asset_id;
        $assets->asset_name = $request->asset_name;
        $assets->model = $request->model;
        $assets->serial_number = $request->serial_number;
        $assets->supplier = $request->supplier;
        $assets->condition = $request->condition;
        $assets->purchase_date = $request->purchase_date;
        $assets->warranty = $request->warranty;
        $assets->warranty_end = $request->warranty_end;
        $assets->price = $request->price;
        $assets->status = $request->status;
        $assets->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        // $assets = Asset::find($id);

        // // dd($assets);
        // return $assets;
    }

    public function update(Request $request, $id)
    {
        $assets = Asset::find($id);
        // dd($assets);

        $assets->asset_user = $request->asset_user;
        $assets->asset_id = $request->asset_id;
        $assets->asset_name = $request->asset_name;
        $assets->model = $request->model;
        $assets->serial_number = $request->serial_number;
        $assets->supplier = $request->supplier;
        $assets->condition = $request->condition;
        $assets->purchase_date = $request->purchase_date;
        $assets->warranty = $request->warranty;
        $assets->warranty_end = $request->warranty_end;
        $assets->price = $request->price;
        $assets->status = $request->status;
        $assets->save();

        // $assets->update();
        // $assets->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $assets = Asset::find($id);
        $assets->delete();
        return redirect()->back();
        // File::delete(public_path($assets->image));
        // $assets->delete();
    }

    // public function searchAsset(Request $request){
    //     $assets = Asset::all();
    //     if($assets->isNotEmpty(){
    //         $assets = Asset::all();
    //     })
    // }
}
