<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categori;
use App\Models\Rak;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_category',
        'id_rak',
        'cover',
        'buku_kode',
        'judul',
        'penerbit',
        'pengarang',
        'tahun',       
        'stok',

    ];

    public function categoris()
    {
        return $this->BelongsTo('App\Models\Categori','id_category','id');
    }

    public function rak()
    {
        return $this->BelongsTo('App\Models\Rak','id_rak','id');
    }
}


