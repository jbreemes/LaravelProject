<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Afspraak::all();
        $workers = Employee::all();
        return view('admin', compact('events', 'workers'));
    }



    public function showLoginForm()
    {
        return view('adminlogin');
    }

    /**
     * Handle an admin login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // The user is authenticated...
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
{
    // Get events for the calendar
    $events = Afspraak::all();

    return view('admin.dashboard', compact('events'));
}

}