<?php

namespace App\Http\Controllers;


use App\Client;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        $clients = Client::all();
        return view('Employees.clients.index', [
            'clients' => $clients,
            'projects' => $projects
        ]);
    }

    public function dataClients()
    {
        $clients = Client::with('projects')->get();
        return $clients;
    }

    public function insertClients(Request $request)
    {
        $id_client = IdGenerator::generate(['table' => 'tbl_clients', 'length' => 7, 'prefix' => date('hms')]);
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        // File extension
        // $extension = $file->getClientOriginalExtension();

        // File upload location
        $location = 'uploads/imgClients/';

        // Upload file
        $file->move($location, $filename);

        // File path
        $filepath = 'uploads/imgClients/' . $filename;

        $client = new Client;
        $client->name = $request->name;
        $client->image = $filepath;
        $client->id_client = "CLT-" . $id_client;
        // $client->id_client = $request->id_client;
        $client->email = $request->email;
        $client->position = $request->position;
        $client->birthday = $request->birthday;
        $client->phone = $request->phone;
        $client->company = $request->company;
        $client->address = $request->address;
        $client->gender = $request->gender;
        $client->save();

        // dd($client);
        return response()->json([
            'data' => $client
        ]);
    }

    public function editClients($id)
    {
        $client = Client::find($id);
        // $client = Client::all();
        return $client;
    }

    public function updateClients(Request $request, $id)
    {
        $clients = Client::find($id);
        $imageOld = $clients->image;
        if ($request->hasFile('image')) {

            File::delete(public_path($imageOld));

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'uploads/imgClients/';

            // Upload file
            $file->move($location, $filename);

            // File path
            $filepath = 'uploads/imgClients/' . $filename;
        } else {
            $filepath = $imageOld;
        }

        $clients->name = $request->name;
        $clients->image = $filepath;
        $clients->id_client = $request->id_client;
        $clients->email = $request->email;
        $clients->position = $request->position;
        $clients->birthday = $request->birthday;
        $clients->phone = $request->phone;
        $clients->company = $request->company;
        $clients->address = $request->address;
        $clients->gender = $request->gender;
        $clients->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $clients]);
    }

    public function deleteClients($id)
    {
        $clients = Client::find($id)->delete();
        return response()->json($clients);
    }

    public function detailClients($id)
    {
        $clients = Client::find($id);
        // $clients = Client::all();
        $projects = Project::where('client_id', $id)->get();
        $users = User::all();
        return view('Employees.clients.show', [
            'clients' => $clients,
            'projects' => $projects,
            'users' => $users
        ]);
    }
}
