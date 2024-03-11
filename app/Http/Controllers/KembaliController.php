<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Denda;
use App\Models\Petugas;
use App\Models\LogPeminjaman;
use Carbon\Carbon;
use DB;
use Session;

class KembaliController extends Controller
{
     public function index()
    {
        $user = User::all();
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('actual_waktu_kembali', '!=',null)->get();
        return view('peminjaman.kembali',compact('denda','log','user','buku'));
    }
    public function print()
    {
        $user = User::all();
        $buku = Buku::all();
        $petugas = Petugas::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('actual_waktu_kembali', '!=',null)->get();
        return view('peminjaman.kembali-cetak',compact('petugas','denda','log','user','buku'));
    }

    public function printdetail($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $petugas = Petugas::all();
        $peminjam = Peminjam::all();
        return view('peminjaman.kembali-detail-cetak',compact('petugas','denda','log','peminjam','buku'));
    }
    public function printdetailaksi(Request $request,$id)
    {
      $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $user = User::all();
        $petugas = Petugas::all();
        return view('peminjaman.kembali-detail-cetak',compact('petugas','denda','log','user','buku'));
    }

     public function kembali($id)
    {

        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $petugas = Petugas::all();
        $denda = Denda::all();
        $user = User::all();
        return view('peminjaman.daftarkembali',compact('petugas','denda','log','user','buku'));
    }

    public function detail($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $user = User::all();
        $petugas = Petugas::all();
        return view('peminjaman.kembali-detail',compact('petugas','denda','log','user','buku'));
    }

    public function detailaksi($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $user = User::all();
        $petugas = Petugas::all();
        return view('peminjaman.kembali-detail',compact('petugas','denda','log','user','buku'));
    }

      public function detailpinjam($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $user = User::all();
        return view('peminjaman.pinjam-detail',compact('denda','log','user','buku'));
    }

    public function detailpinjamaksi($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $buku = Buku::all();
        $denda = Denda::all();
        $user = User::all();
        $petugas = Petugas::all();
        return view('peminjaman.pinjam-detail',compact('petugas','denda','log','user','buku'));
    }


    public function kembaliaksi(Request $request,$id)
    {
        $kembali = $request->all();
        $log = LogPeminjaman::with('buku')->where($request->buku_id)->where('id',$id)->first();
        $log->buku->stok++;

        $count = $log->count();
        $log->actual_waktu_kembali = Carbon::now()->toDateString();
        // $log->actual_waktu_kembali =$kembali['actual_waktu_kembali'];
        $log->save();
        $log->buku->save();
        Session::flash('message', 'Buku berhasil dikembalikan');
        Session::flash('alert-class', 'alert-success');
        return redirect ('daftarpinjam');

        // jika pake Carbon
        /*$log->actual_waktu_kembali = Carbon::now()->toDateString();*/

        // peminjam dan buku yg dipilih untuk di kembalikan benar,maka kembalikan buku
        // jika salah,maka muncul notifikasi error
        // $kembali = LogPeminjaman::where('user_id',$request->user_id)
        // ->where('buku_id',$request->buku_id)
        // ->where('actual_waktu_kembali', null);
        // $rentData = $kembali->first();
        // $countData = $kembali->count();

        

        
    }

     public function delete($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $log->delete();
        return redirect ('daftarkembali')->with('status','Data berhasil di hapus');
    }
}
