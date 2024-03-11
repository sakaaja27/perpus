<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\LogPeminjaman;
use App\Models\Categori;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $CountBuku = Buku::count();
        $CountUser = User::where('role_id',2)->count();
        $countpinjam = LogPeminjaman::where('actual_waktu_kembali',null)->count();
        $countkembali = LogPeminjaman::where('actual_waktu_kembali','!=', null)->count();
        return view('admin.dashboard',[
            'buku' => $CountBuku,
            
            'user' => $CountUser,
            'pinjam' => $countpinjam,
            'kembali' => $countkembali
        ]);
    }
}
