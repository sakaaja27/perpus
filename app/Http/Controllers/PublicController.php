<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Categori;

use App\Models\Rak;
class PublicController extends Controller
{
    public function index(Request $request)
    {
        
        $categori = Categori::all();

        // jika yg dikirim dari form berupa categori atau judul maka jalankan ini
        if ($request->category || $request->judul) {
            $buku = Buku::where('judul','like','%'.$request->judul.'%')->get();
        }
        // jika tidak
        else{
            $buku = Buku::all();
        }

        
        return view('publik.listbuku',compact('buku','categori'));
    }

    public function edit($id)
    {
        $buku = Buku::where('id',$id)->first();
        $categori = Categori::all();
        $nama_rak = Rak::all();
        return view('publik.detail',compact('buku','categori','nama_rak'));
    }

     public function view(Request $request, $id)
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

        return redirect ('detail')->with('status','Data berhasil diupdate');
    }
}
