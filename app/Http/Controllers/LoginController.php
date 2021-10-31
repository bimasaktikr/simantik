<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Prophecy\Call\Call;

class LoginController extends Controller
{   
    public function index()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(true);
            // return redirect()->intended('dashboard');
        }

        return response()->json(false);
        
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect ('login');
    }

    public function adminseeder()
    {

        return Artisan::call("db:seed", [
            'class' => 'AdminSeeder'
        ]);

    }
}
