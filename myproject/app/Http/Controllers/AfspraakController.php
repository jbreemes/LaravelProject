<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Afspraak;


class AfspraakController extends Controller
{
    /**
     * Display the calendar with events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Afspraak::all();

        return response()->view('admin', compact('events'));
    }

    /**
     * Store a new appointment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse

{
    // validate input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'klant_id' => 'required|integer',
    ]);

    // create new appointment
    $afspraak = new Afspraak();
    $afspraak->title = $validatedData['title'];
    $afspraak->name = $validatedData['name'];
    $afspraak->start_time = $validatedData['start_time'];
    $afspraak->end_time = $validatedData['end_time'];
    $afspraak->Klant_idKlant = $validatedData['klant_id'];
    $afspraak->admin_idadmin = '1';
    $afspraak->save();

    // redirect back to the current page with a success message
    return redirect()->back()->with('success', 'Appointment created successfully!');



}


    /**
     * Show the details of a specific appointment.
     *
     * @param  int  $idAfspraak
     * @param  int  $Klant_idKlant
     * @param  int  $Admin_idAdmin
     * @return \Illuminate\Http\Response
     */
    public function show($idAfspraak, $Klant_idKlant, $Admin_idAdmin)
    {
        $afspraak = Afspraak::where('idAfspraak', $idAfspraak)
            ->where('Klant_idKlant', $Klant_idKlant)
            ->where('Admin_idAdmin', $Admin_idAdmin)
            ->firstOrFail();

    
            return response()->view('afspraak.show', compact('afspraak'));
        
    }



}
