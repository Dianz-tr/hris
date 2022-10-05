<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Helpers\Helper;
use App\Ticket;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $ticket = Ticket::where('assign_staff', 'like', '%' . $request->carisatu . '%')->get();
            $clients = Client::all();
            $employee = Employee::all();
        } else {
            $ticket = Ticket::all();
            $clients = Client::all();
            $employee = Employee::all();
        }
        // dd($clients);
        return view('ticket.index', compact('ticket', 'clients', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket_id = Helper::IDGenerator(new Ticket, 'ticket_id', 4, 'TKT-');

        $ticket = new Ticket();
        $ticket->ticket_id = "" . $ticket_id;
        $ticket->ticket_subject = $request->get('ticket_subject');
        $ticket->assign_staff = $request->get('assign_staff');
        $ticket->client = $request->get('client');
        $ticket->priority = $request->get('priority');
        $ticket->status = $request->get('status');
        $ticket->cc = $request->get('cc');
        $ticket->assign = $request->get('assign');
        $ticket->add_followers = $request->get('add_followers');
        $ticket->description = $request->get('description');
        $ticket->save();

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return $ticket;
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
        $ticket = Ticket::find($id);
        $input = $request->all();
        $ticket->fill($input)->save();

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
        Ticket::find($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        // $ticket = Ticket::with('employee')->get();
        // return $ticket;
        // menangkap data pencarian
        $search = $request->get('search');
        $status = $request->get('status');
        $priority = $request->get('priority');
        // $created_at = $request->get('created_at');
        // $updated_at = $request->get('updated_at');
        $ticket = DB::table('tbl_tickets')
            ->where('assign_staff', 'like', '%' . $request->search . '%')
            ->where('status', 'like', '%' . $request->status . '%')
            ->where('priority', 'like', '%' . $request->priority . '%')
            // ->where('created_at', 'like', '%' .$request->created_at. '%')
            // ->where('updated_at', 'like', '%' .$request->updated_at. '%')
            ->get();
        // dd($ticket);
        // mengirim data pegawai ke view index
        return view('ticket.index', ['ticket' => $ticket]);
        // return redirect(['ticket' => $ticket])->back();

    }

    public function reportsindex(Request $request)
    {
        // $request->cari;
        // if($request){
        //     $ticket = Ticket::with('Employee')
        //         ->where('assign_staff','like','%'.$request->carisatu.'%')
        //         ->where('status','like','%'.$request->caridua.'%')
        //         ->where('priority','like','%'.$request->caritiga.'%')
        //         ->where('created_at','like','%'.$request->cariempat.'%')
        //         ->where('updated_at','like','%'.$request->carilima.'%')->get();

        // }
        // if($request){
        //     $ticket = Ticket::with('Employee')->where('assign_staff','like','%'.$request->carisatu.'%')->get();

        // }else{

        //     // $ticket = Ticket::with('Employee')->get();
        //     $ticket = Ticket::all();
        // }
        // $ticket = $request->filter(function ($item) {
        //     return data_get($item, 'age') >= 4;
        // });

        if ($request) {
            $ticket = Ticket::with('employee')->where('assign_staff', 'like', '%' . $request->carisatu . '%')->get();
        } else {
            $ticket = Ticket::with('employee')->get();
        }
        // if($request){
        //     $ticket = Ticket::with('Employee')->where('assign_staff','like','%'.$request->carisatu.'%')->get();

        // }
        // if($request){
        //     $ticket = Ticket::with('Employee')->where('status','like','%'.$request->carisatu.'%')->get();

        // }

        // dd($ticket);
        // dd($user);
        // dd($employee);
        return view('ticket.index', compact('ticket', 'clients', 'employee'));
    }
}
