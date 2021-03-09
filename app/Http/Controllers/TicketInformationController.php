<?php

namespace App\Http\Controllers;

use App\Imports\TicketInformationImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRegistration;
use App\Models\TicketInformation;

class TicketInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket     = TicketInformation::all();
        $activated  = TicketInformation::whereNotNull('name')->get();

        return view('dashboard', compact('ticket', 'activated'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRegistration $request)
    {
        // Find Ticket Code
        $ticket= TicketInformation::where('ticket_code', $request->code)->first();

        // Check if the ticket code is existing
        if(is_null($ticket)){
            return redirect()->back()->withErrors("Ticket code doesn't exist");
        }

        // If code exist check if there is owner
        if(is_null($ticket->name) && is_null($ticket->email)){

            //Begin update
            $ticket->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);

            return redirect('/')->with('success', 'All good!');
        }

        return redirect()->back()->withErrors("Ticket already register!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {

        Excel::import(new TicketInformationImport, request()->file('file'));

        return redirect('/dashboard')->with('success', 'All good!');
    }
}
