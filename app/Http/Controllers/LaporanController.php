<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogPeminjaman;
use App\Models\User;
use App\Models\Buku;
use App\Models\Denda;
use App\Models\Petugas;

class LaporanController extends Controller
{
    public function pinjam()
    {
        
        return view('laporan.laporanpinjam');
    }

    public function printpinjam($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal,"Tanggal Akhir".$tglakhir]);
        $user = User::all();
        $buku = Buku::all();
        $petugas = Petugas::all();
        $denda = Denda::all();
        $print = LogPeminjaman::whereBetween('waktu_pinjam',[$tglawal,$tglakhir])->get();
        
        return view('laporan.printlaporan',compact('petugas','denda','print','user','buku'));
    }
}
