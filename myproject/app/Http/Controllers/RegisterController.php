<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:Klant,email',
            'password' => 'required|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        DB::table('Klant')->insert([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return redirect('/login');
    }
}

