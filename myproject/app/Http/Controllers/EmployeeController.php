<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;

class EmployeeController extends Controller
{
 
public function employeeCalendar()
{
    $events = Afspraak::all();
    
    return view('employee', compact('events'));
}



}

