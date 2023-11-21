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


    public function login(Akun $akun, Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        $login = Auth::attempt($credentials) ;

        if ($login) {
            $user = Auth::user();

            return redirect('mobil')->with('_token', Session::token());
        }else {
            return redirect()->back()->withErrors('Terdapat kesalahan Username atau Password')->withInput()->with('_token', Session::token());
        }

       
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
