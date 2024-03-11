<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Categori;
use App\Models\Rak;
use DB;
class BukuController extends Controller
{
    public function index()
    {
        $categori = Categori::all();
        $nama_rak = Rak::all();
        $buku = Buku::all();
        return view('buku.buku',compact('buku','categori','nama_rak'));
    }

    public function add()
    {
        $categori = Categori::all();
        $nama_rak = Rak::all();
        $buku = Buku::all();

        // select DB raw max dan rightnya ambil kolom buku_kode dan kodenya saya isi 4 dan jadikan aliasin jadi kode
        $cd =DB::table('bukus')->select(DB::raw('MAX(RIGHT(buku_kode,4)) as kode'));
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

        return view('buku.buku-add',compact('buku','categori','nama_rak','bk'));
    }

    public function store(Request $request)
    {

        // validate biar kolom nama menjadi unique 
        $request->validate([
            'buku_kode' => 'max:255',
            'judul' => 'required|max:255',
            'id_category' => 'required',
            'id_rak' => 'required',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'tahun' => 'required|max:255',
            'stok' => 'required|max:255',
            

        ]);
        $newName ='';
            // pake artisan storage:link agar file yg diaplob bisa keliatan 
        // jika image di upload
        if ($request->file('image')) {
            //kita bisa ambil extension nya apakah jpg.png dll
            $extension = $request->file('image')->getClientOriginalExtension();
            // buat judul cover dari kolom judul trus kapan diupload dan extensinya
            $newName = $request->judul.'-'.now()->timestamp.'.'.$extension;
            // simpan file image ke kolom cover
            $request->file('image')->storeAs('cover',$newName);
        }

        $request['cover'] = $newName;

        if ($request->id_category === null || $request->id_rak === null){
            return redirect()->back();
        }

        // Buku::create([
        //     'id_category' => $request->id_category,
        //     'id_rak' => $request->id_rak,
        //     'cover' =>$request->image,
        //     'judul' => $request->judul,
        //     'buku_kode' => $request->buku_kode,
        // ]);
        $buku = Buku::create($request->all());
        return redirect ('buku')->with('status','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $buku = Buku::where('id',$id)->first();
        $categori = Categori::all();
        $nama_rak = Rak::all();
        return view('buku.buku-edit',compact('buku','categori','nama_rak'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->judul.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover',$newName);
            $request['cover'] = $newName;
        }

        $buku = Buku::where('id',$id)->first();
        $buku->update($request->all());
        // Buku::update([
        //     'id_category' => $request->id_category,
        //     'id_rak' => $request->id_rak,
        //     'judul' => $request->judul,
        //     'buku_kode' => $request->buku_kode,
        // ]);

        return redirect ('buku')->with('status','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $buku = Buku::where('id',$id)->first();
        $buku->delete();
        return redirect ('buku')->with('status','Data berhasil di hapus');
    }


}
