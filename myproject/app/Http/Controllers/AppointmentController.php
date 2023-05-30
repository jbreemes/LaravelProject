<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Afspraak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AppointmentController extends Controller
{
    public function index()
    {
        $afspraak = Afspraak::all();
        $appointments = Appointment::all();
        return view('admin', ['afspraak' => $afspraak, 'appointments' => $appointments]);
    }
    

    
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'notes' => 'nullable|string',
            'idKlant' => 'required|integer'
        ]);

        // Insert appointment into database
        $appointment = new Appointment();
        $appointment->name = $validatedData['name'];
        $appointment->start_time = $validatedData['start_time'];
        $appointment->end_time = $validatedData['end_time'];
        $appointment->notes = $validatedData['notes'];
        $appointment->idKlant = $validatedData['idKlant'];
        $appointment->save();

        // Redirect to the appointments index page
        return back();
    }

    public function show(Appointment $appointment)
    {
        $appointments = Appointment::all();
        return view('admin', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'notes' => $request->input('notes'),
            'approved' => true
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        $appointmentIds = $request->input('appointments');
        Appointment::whereIn('idappointments', $appointmentIds)->delete();
        return back();
    }
    

public function calendar(){
    $events = Afspraak::all();

    return view('admin', compact('events'));

}


}
