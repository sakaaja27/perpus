<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    
    public function login()
    {
        return view('login'); 
    }
    public function register()
    {
        $user = User::all();

         // select DB raw max dan rightnya ambil kolom buku_kode dan kodenya saya isi 4 dan jadikan aliasin jadi kode
        $cd =DB::table('users')->select(DB::raw('MAX(RIGHT(kode_anggota,4)) as kode'));
        $bk = "";

        // jika variabel cd lebih dari 0 maka jalankan kodenya
        if ($cd->count()>0) {
            foreach($cd->get() as $a){
                $b = ((int)$a->kode)+1;
                $bk = sprintf("%04s",$b);
            }
        }
        else {
            $bk = "Kode tidak ada";

        }
        return view('register',compact('user','bk'));
    }

    public function registerProses(Request $request)
    {
        $validated = $request->validate([
            'kode_anggota' => 'unique:users|max:255',
            'nama_lengkap' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'jk' => 'required',
            'status' => 'required',
            'email' => 'required|max:255',
            'password' =>  ['required','min:8','string','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
            'tlp' => 'required|numeric',
            'alamat' => 'required|max:255',
        ]);
        // bcrypt password
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        return redirect('register')->with('status','Data berhasil ditambah');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
        'email' => ['required'],
        'password' => ['required'],
        ]);
        // apakah credential yg dimaksudkan fun diatas ada engga di database kalo ada bakan bikin session
        // dan ke dashboard
        if (Auth::attempt($credentials)) {
            // jika admin bisa akses dashboard
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
            return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2) {
            return redirect('anggotadashboard');
            }
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        }

        Session::flash('status','failed');
        Session::flash('message','Email atau Passoword Salah ');
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}