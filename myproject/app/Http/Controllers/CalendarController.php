<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class CalendarController extends Controller
{
    public function index()
{
    $events = Afspraak::all();

    return view('welcome', compact('events'));
    
}

public function indexa()
{
    $events = Afspraak::all();

    return view('admin', compact('events'));
    
}

public function adminCalendar()
{
    $events = Afspraak::all();
    
    return view('admin', compact('events'));
}

public function employeeCalendar()
{
    $events = Afspraak::all();
    
    return view('admin', compact('events'));
}


public function create()
{
    return view('create-appointment');
}

public function store(Request $request)
{
$appointment = new Afspraak;
$appointment->title = $request->title;
$appointment->start_time = $request->start;
$appointment->end_time = $request->end;
$appointment->save();

return redirect()->route('calendar.index')->with('success', 'Appointment created successfully.');
}

}

