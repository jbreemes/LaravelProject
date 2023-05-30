<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterEmployeeController extends Controller
{
    /**
     * Show the employee registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register-employee');
    }

    /**
     * Handle an employee registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employee'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $employee = Employee::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Authenticate the employee and redirect them to the dashboard
        auth()->guard('employee')->login($employee);
        return redirect()->route('admin')->with('success', 'Employee registration successful!');
    }
}
