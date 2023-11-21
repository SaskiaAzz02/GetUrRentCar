<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    //
    public function index(Akun $akun)
    {
        return view('login.login');
    }

    function login(Request $request)
    {
        $validatedData = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
            ],
        );

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Session::regenerate();
            if ($user->role == 'superadmin') {
                return redirect('mobil');
            } elseif ($user->role == 'admin') {
                return redirect('penyewaan');
            }
        }

        return redirect()->back();
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/login');
    }
}
