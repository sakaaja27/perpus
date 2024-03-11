<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthForgotPasswordController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ResetPassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class,'index']);
Route::get('detail/{id}', [PublicController::class,'edit']);
Route::post('detail/{id}', [PublicController::class,'view']);
Route::middleware('only_guest')->group(function() {
	Route::get('login', [AuthController::class,'login'])->name('login');
	Route::post('login', [AuthController::class,'authenticating']);
	Route::get('register', [AuthController::class,'register']);
	Route::get('reset-pass', [ResetPassController::class,'reset']);
	Route::get('reset-passedit/{id}', [ResetPassController::class,'edit']);
	Route::post('reset-passedit/{id}', [ResetPassController::class,'aksireset']);
	Route::post('register', [AuthController::class,'registerProses']);
	
	// reset
	// Route::get('password/reset',  [AuthForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
	// Route::post('password/email',  [AuthForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
	// Route::post('password/email',  [AuthForgotPasswordController::class,'validateEmail'])->name('password.email');
	// Route::post('password/email',  [AuthForgotPasswordController::class,'broker'])->name('password.email');

});

Route::middleware('auth')->group(function() {

	Route::post('logout', [AuthController::class,'logout']);
	Route::middleware('only_admin')->group(function() {
		// only_admin kalo bukan admin maka akan dibuang ke halaman buku
	
		
		Route::get('dashboard', [DashboardController::class,'index']);

		// Laporan
		Route::get('laporanpinjam', [LaporanController::class,'pinjam']);
		Route::get('print-pinjam/{tglawal}/{tglakhir}', [LaporanController::class,'printpinjam']);	

		// category
		Route::get('category', [CategoryController::class,'index']);
		Route::get('category-add', [CategoryController::class,'add']);
		Route::post('category-add', [CategoryController::class,'store']);
		Route::get('category-edit/{id}', [CategoryController::class,'edit']);
		Route::post('category-edit/{id}', [CategoryController::class,'update']);
		Route::get('category-delete/{id}', [CategoryController::class,'delete']);
		Route::get('category-restore/{id}', [CategoryController::class,'restore']);
		Route::get('category/{id}', [CategoryController::class,'viewDelete']);

		// Rak
		Route::get('rak', [RakController::class,'index']);
		Route::post('rak-add', [RakController::class,'store']);
		Route::get('rak-edit/{id}', [RakController::class,'edit']);
		Route::post('rak-edit/{id}', [RakController::class,'update']);
		Route::get('rak-delete/{id}', [RakController::class,'delete']);
		Route::get('rak-restore/{id}', [RakController::class,'restore']);
		Route::get('rak/{id}', [RakController::class,'viewDelete']);

		// user / anggota
		Route::get('user', [UserController::class,'index']);
		Route::get('create-user', [UserController::class,'add']);
		Route::post('create-user', [UserController::class,'store']);
		Route::get('detail-user/{id}', [UserController::class,'show']);
		Route::post('detail-user/{id}', [UserController::class,'update']);
		Route::get('user-delete/{id}', [UserController::class,'delete']);

		// buku
		Route::get('buku', [BukuController::class,'index']);
		Route::get('buku-add', [BukuController::class,'add']);
		Route::post('buku-add', [BukuController::class,'store']);
		Route::get('buku-edit/{id}', [BukuController::class,'edit']);
		Route::post('buku-edit/{id}', [BukuController::class,'update']);
		Route::get('buku-delete/{id}', [BukuController::class,'delete']);

		// petugas
		Route::get('petugas', [PetugasController::class,'index']);;
		Route::post('petugas-add', [PetugasController::class,'store']);
		Route::get('petugas-edit/{id}', [PetugasController::class,'edit']);
		Route::post('petugas-edit/{id}', [PetugasController::class,'update']);
		Route::get('petugas-delete/{id}', [PetugasController::class,'delete']);

		// denda
		Route::get('denda', [DendaController::class,'index']);
		Route::get('denda-edit/{id}', [DendaController::class,'edit']);
		Route::post('denda-edit/{id}', [DendaController::class,'update']);
	});
	// 	// daftar pinjam
	// Route::get('daftarpeminjam', [PeminjamController::class,'index']);
	// Route::post('daftarpeminjam-add', [PeminjamController::class,'store']);
	// Route::get('daftarpeminjam-edit/{id}', [PeminjamController::class,'edit']);
	// Route::post('daftarpeminjam-edit/{id}', [PeminjamController::class,'update']);
	// Route::get('daftarpeminjam-delete/{id}', [PeminjamController::class,'delete']);

		// daftar peminjaman
	Route::get('pinjambuku', [PeminjamanController::class,'index']);
	Route::post('pinjambuku', [PeminjamanController::class,'store']);
	Route::get('pinjam-delete/{id}', [PeminjamanController::class,'delete']);

	Route::get('daftarpinjam', [PeminjamanController::class,'pinjam']);
	// daftar peminjaman
	Route::get('daftarkembali', [KembaliController::class,'index']);
	Route::get('kembali-detail/{id}', [KembaliController::class,'detail']);
	Route::get('kembali-detail/{id}', [KembaliController::class,'detailaksi']);
	Route::get('pinjam-detail/{id}', [KembaliController::class,'detailpinjam']);
	Route::get('pinjam-detail/{id}', [KembaliController::class,'detailpinjamaksi']);
	Route::get('daftarkembali/{id}', [KembaliController::class,'kembali']);
	Route::post('daftarkembali/{id}', [KembaliController::class,'kembaliaksi']);
	Route::get('kembali-cetak', [KembaliController::class,'print']);
	Route::get('kembali-cetak-detail/{id}', [KembaliController::class,'printdetail']);
	Route::get('kembali-cetak-detail/{id}', [KembaliController::class,'printdetailaksi']);
	Route::get('kembali-delete/{id}', [KembaliController::class,'delete']);
	

		// only_klien kalo bukan klien maka akan dibuang ke halaman buku
	Route::get('anggotadashboard', [UserController::class,'anggotadashboard'])->middleware('only_klien');
	Route::get('profile/{id}', [UserController::class,'profile'])->middleware('only_klien');
	Route::post('profile/{id}', [UserController::class,'updateprofile'])->middleware('only_klien');

	
	Route::get('history', [UserController::class,'history'])->middleware('only_klien');
	Route::get('peminjamanbuku', [PeminjamanController::class,'profile'])->middleware('only_klien');
});
