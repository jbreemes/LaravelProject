<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use App\Models\Employee;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function index()
    {
        $afspraak = Afspraak::all();
        $workers = Employee::all();
        $appointments = Appointment::all();
        return view('admin', compact('afspraak', 'workers', 'appointments'));
    }
    
}