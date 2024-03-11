<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Denda;
class LogPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'buku_log_peminjaman';
    protected $fillable = [
        'buku_id',
        'user_id',
        'id_petugas',
        'denda_id',
        'waktu_pinjam',
        'waktu_kembali',
    ];

    public function user()
    {
        return $this->BelongsTo('App\Models\User','user_id','id');
    }

    public function buku()
    {
        return $this->BelongsTo('App\Models\Buku','buku_id','id');
    }

     public function petugas()
    {
        return $this->BelongsTo('App\Models\Petugas','id_petugas','id');
    }

    public function denda()
    {
        return $this->BelongsTo('App\Models\Denda','denda_id','id');
    }
}
