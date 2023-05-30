<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkLoginController extends Controller
{
    public function showLoginForm()
{
    return view('worklogin');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::guard('employee')->attempt($credentials)) {
    return redirect()->route('employee-dashboard');


} else {
    return redirect()->back()->withErrors([
        'email' => 'De ingevoerde gegevens zijn onjuist.',
    ])->withInput($request->only('email', 'remember'));
}

}

public function dashboard()
{
    // Get events for the calendar
    $events = Afspraak::all();
    $employee = employee::all();
    return view('work', compact('events', 'employee'));

    
}

}
