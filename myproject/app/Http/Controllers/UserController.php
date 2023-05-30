<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the account form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showAccountForm()
    {
        $Klant = Auth::user();

        return view('account', compact('Klant'));
    }

    /**
     * Update the user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAccount(Request $request)
    {
        $Klant = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'Adres' => 'required|string|max:255',
            'Tel' => 'required|string|max:255',
        ]);

        $Klant->update($validatedData);

        return redirect()->route('account')->with('success', 'Your account has been updated.');
    }
}
