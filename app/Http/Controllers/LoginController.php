<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petugas;
use DB;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request){

    // Validate the form data
    $this->validate($request, [
    'username' => 'required',
    'password' => 'required'
    ]);

    // Attempt to log the user in
    // Passwordnya pake bcrypt
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $akun = Petugas::where('username', $request->username)->first();
        // dd($akun);
        // if successful, then redirect to their intended location        
        if($akun->level == 'admin'){
            Auth::guard('admin')->LoginUsingId($akun->id);
            return redirect()->route('admin.dashboard');
        }elseif($akun->level == 'petugas'){
            Auth::guard('petugas')->LoginUsingId($akun->id);
            return redirect()->route('petugas.dashboard');            
        }
        return redirect()->route('login')->with('error', 'Akun tidak ada');
    }
    return redirect('/')->with('error', "Gagal Login");
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }elseif(Auth::guard('petugas')->check()){
            Auth::guard('petugas')->logout();
        }
        return redirect('/');
    }
}