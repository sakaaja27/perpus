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
class PeminjamanController extends Controller
{

    public function pinjam()
    {
        $user = User::where('role_id','2')->get();
        $buku = Buku::all();
        $denda = Denda::all();
        $log = LogPeminjaman::where('actual_waktu_kembali',null)->get();
        return view('peminjaman.daftarpinjam',compact('denda','log','user','buku'));
    }
   
    public function index()
    {
        $user = User::where('role_id','2')->get();
        $petugas = Petugas::all();
        $buku = Buku::all();
        $denda = Denda::all();
        return view('peminjaman.transaksipinjam',compact('petugas','denda','user','buku'));
    }
    // pinjam
    public function store(Request $request)
    {

        // penngunaan carbon untuk otomatis isi tanggal
        $request['waktu_pinjam'] = Carbon::now()->toDateString();
        // disini waktu kembali itu maksimal 3 hari setelah tgl peminjaman
        $request['waktu_kembali'] = Carbon::now()->addDay(2)->toDateString();
        
        $buku = Buku::findorFail($request->buku_id)->only('stok');
        // jika stok dari buku tidak sama dengan stok  ada maka tampilkan buku sedang dipinjam
        if ($buku['stok'] == 0) {
        // flash() digunakan untuk membuat session yg bersifat satu kali pakai
        Session::flash('message', 'Tidak bisa pinjam,stok buku tidak ada');
        Session::flash('alert-class', 'alert-danger');
        return redirect ('pinjambuku');
        }
        else {
            // Anggota hanya boleh meminjam 2 buku jika lebih dari 2 buku maka akan tampil session
            $count = LogPeminjaman::where('user_id',$request->user_id)->where('actual_waktu_kembali', null)->count();
            if ($count >= 2) {
            Session::flash('message', 'Tidak bisa pinjam,Peminjam telah mencapai limit ');
            Session::flash('alert-class', 'alert-danger');
            return redirect ('pinjambuku');
            }
            else {
                    try {
                    DB::beginTransaction();
                    // proses insert
                    LogPeminjaman::create($request->all());
                    // proses update tabel buku
                    $buku = Buku::findorFail($request->buku_id);
                    $buku->stok--;
                    $buku->save();
                    DB::commit();
                    Session::flash('message', 'Buku Berhasil Dipinjam');
                    Session::flash('alert-class', 'alert-success');
                    return redirect ('pinjambuku');
                    }
                    catch (\Throwable $th) {
                    DB::rollBack();
                    // dd($th);
                    

                    }
                }
        }

    }

    public function delete($id)
    {
        $log = LogPeminjaman::where('id',$id)->first();
        $log->delete();
        return redirect ('daftarpinjam')->with('status','Data berhasil di hapus');
    }



}