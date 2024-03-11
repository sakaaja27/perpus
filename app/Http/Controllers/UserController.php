<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use App\Models\Denda;
use App\Models\LogPeminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function anggotadashboard()
    {
        $user = User::where('id',Auth::user()->id)->get();
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('user_id',Auth::user()->id)->get();
        return view('klien.anggotadashboard',compact('user','denda','buku','log'));
    }

    public function add()
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

        return view('user.create-user',compact('user','bk'));
    }

     public function store(Request $request)
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
        return redirect('user')->with('status','Data berhasil ditambah');
    }

    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('user_id',$user->id)->get();
        return view('klien.profile',compact('user','denda','buku','log'));
    }

    public function updateprofile(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $user->kode_anggota = $request->kode_anggota;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jk = $request->jk;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->tlp = $request->tlp;
        $user->alamat = $request->alamat;
         if ($request->has('password') && $request->password != "") 
            // $user->password = bcrypt($request->password);
            $user->password = Hash::make($request->password);
        $user->update();
        
        return redirect ('anggotadashboard')->with('status','Data berhasil di Update');
    }
    
   
    public function history()
    {
        
        
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('user_id',Auth::user()->id)->get();
        return view('klien.history',compact('denda','buku','log'));
    }

    public function index()
    {
        $user = User::where('role_id','2')->get();
        

        return view('user.user',compact('user'));
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
        
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('user_id',$user->id)->get();
        return view('user.detail',compact('user','denda','buku','log'));
    }

    public function update(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $user->kode_anggota = $request->kode_anggota;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jk = $request->jk;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->tlp = $request->tlp;
        $user->alamat = $request->alamat;
         if ($request->has('password') && $request->password != "") 
            // $user->password = bcrypt($request->password);
            $user->password = Hash::make($request->password);
        $user->update();
        
        return redirect ('user')->with('status','Data berhasil di Update');
    }
    
    // unttuk create nya ada di AuthController

    public function delete($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect ('user')->with('status','Data berhasil di hapus');
    }

    
}
