<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petugas;
use App\Siswa;

class LoginController extends Controller
{    
    public function getLogin()
    {
        return view('auth.login');
    }
    public function getLoginSiswa()
    {
        return view('auth.siswa.login');
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
        // if successful, then redirect to their intended location        
        if($akun->level == 'admin'){
            Auth::guard('admin')->LoginUsingId($akun->id);
            return redirect()->route('admin.dashboard');
        }elseif($akun->level == 'petugas'){
            Auth::guard('petugas')->LoginUsingId($akun->id);
            return redirect()->route('petugas.dashboard');            
        }
        session()->flash('judul', 'Gagal!');
        session()->flash('message', 'Akun tidak ada');
        session()->flash('jenis', 'error');
        return redirect()->route('login');
        }
    session()->flash('judul', 'Gagal!');
    session()->flash('message', 'Gagal Login. Pastikan username dan password benar yaaa..!!');
    session()->flash('jenis', 'error');    
    return redirect('/');
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'Logout berhasil!!');
            session()->flash('jenis', 'success'); 
            return redirect('/');
        }elseif(Auth::guard('petugas')->check()){
            Auth::guard('petugas')->logout(); 
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'Logout berhasil!!');
            session()->flash('jenis', 'success'); 
            return redirect('/');  
        }elseif(Auth::guard('siswa')->check()){
            Auth::guard('siswa')->logout();
            session()->flash('judul', 'Berhasil!');
            session()->flash('message', 'Logout berhasil!!');
            session()->flash('jenis', 'success'); 
            return redirect('/');
        }
    }

    public function postLoginSiswa(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required'
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)->first();
        // dd($siswa);
        if($siswa){
            Auth::guard('siswa')->LoginUsingId($siswa["id"]);
            return redirect()->route('siswa.dashboard');
        }else{
            session()->flash('judul', 'Gagal!');
            session()->flash('message', 'Gagal Login. Pastikan NISN benar yaaa..!!');
            session()->flash('jenis', 'error'); 
            return redirect('/login-siswa');
        }
    }
}