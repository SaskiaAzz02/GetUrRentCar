<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function index(Akun $akun){
    return view('login.login');
    }

    
    function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'role.required' => 'Role harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role'],
        ];

        if (Akun::attempt($credentials)) {
            $user = Akun::user();

            if ($user->role == 'super_admin' || $user->role == 'admin' || $user->role == 'customer') {
                return redirect('mobil.index')->with('_token', Session::token());
            } 
        }

        return redirect()->back()->withErrors('Terdapat kesalahan Username atau Password')->withInput()->with('_token', Session::token());
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
