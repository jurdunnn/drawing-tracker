<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAsGuestController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $ipAddress = $request->getClientIp();

        $user = User::where('ip_address', $ipAddress)->first();

        if (!$user) {
            $uniqueId = uniqid();

            $user = User::create([
                'name' => 'Guest' . $uniqueId,
                'email' => 'guest-' . $uniqueId .  '@guest.co.uk',
                'password' => Hash::make(uniqid()),
                'guest' => true,
                'ip_address' => $ipAddress,
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('projects');
    }
}
