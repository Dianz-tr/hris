<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Designation;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        $clients = Client::all();
        $users = User::all();
        $projects = Project::all();
        return view('projects.index', [
            'projects' => $projects,
            'clients' => $clients,
            'users' => $users,
            'designations' => $designations
        ]);
    }

    public function dataProjects()
    {
        $projects = Project::with('users', 'clients')->get();
        return $projects;
    }

    public function insertProjects(Request $request)
    {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        // dd($file);
        // File extension
        // $extension = $file->getClientOriginalExtension();

        // File upload location
        $location = 'uploads/projects/';

        // Upload file
        $file->move($location, $filename);

        // File path
        $filepath = 'uploads/projects/' . $filename;

        $projects = new Project();
        $projects->project_name = $request->project_name;
        $projects->client_id = $request->client_id;
        $projects->start_date = $request->start_date;
        $projects->end_date = $request->end_date;
        $projects->lead_project = $request->lead_project;
        $projects->rate = $request->rate;
        $projects->priority = $request->priority;
        $projects->description = $request->description;
        $projects->file = $filepath;
        $projects->save();

        return response()->json([
            'data' => $projects
        ]);
    }

    public function editProjects($id)
    {
        $project = Project::with('clients', 'users', 'employee')->find($id);
        // $client = Client::all();
        return $project;
    }

    public function updateProjects(Request $request, $id)
    {
        $projects = Project::find($id);
        $imageOld = $projects->file;
        if ($request->hasFile('file')) {

            File::delete(public_path($imageOld));

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'uploads/projects/';

            // Upload file
            $file->move($location, $filename);

            // File path
            $filepath = 'uploads/projects/' . $filename;
        } else {
            $filepath = $imageOld;
        }

        $projects->project_name = $request->project_name;
        $projects->client_id = $request->client_id;
        $projects->start_date = $request->start_date;
        $projects->end_date = $request->end_date;
        $projects->lead_project = $request->lead_project;
        $projects->rate = $request->rate;
        $projects->priority = $request->priority;
        $projects->description = $request->description;
        $projects->file = $filepath;
        $projects->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $projects]);
    }

    public function deleteProjects($id)
    {
        $projects = Project::find($id)->delete();
        return response()->json($projects);
    }

    public function detailProjects(Request $request, $id)
    {
        $projects = Project::where('id', $id)->with('users')->get();
        // return $projects;
        // $projects = Project::where();
        $users = User::all();
        return view('projects.detail', [
            'projects' => $projects,
            'users' => $users
        ]);
    }

    public function leads()
    {
        $leads = Project::with('users', 'clients', 'employee')->get();
        // return $leads;
        return view('Leads.index', [
            'leads' => $leads
        ]);
    }

    public function deleteLeads($id)
    {
        $leads = Project::find($id);
        $leads->delete();

        return redirect(route('dtLeads'));
    }

    // public function users($id)
    // {
    // //     $users = DB::table('tbl_project_users')
    // //         ->select('tbl_project_users.*', 'tbl_projects.project_name as project_name', 'users.name as user_name')
    // //         ->join('users', 'tbl_project_users.id_user', '=', 'users.id')
    // //         ->join('tbl_projects', 'tbl_project_users.id_project', '=', 'tbl_projects.id')
    // //         ->where('tbl_project_users.id_project', $id)
    // //         ->get();
    // //     dd($users);
    // //     return $users;
    // // }
}
