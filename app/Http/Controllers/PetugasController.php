<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.petugas',compact('petugas'));
    }

    public function store(Request $request)
    {
        // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'jabatan' => 'required',
            'tlp' => 'required|numeric',
            'alamat' => 'required|max:100',
        ]);

        $petugas = Petugas::create($request->all());
        return redirect ('petugas')->with('status','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $petugas = Petugas::where('id',$id)->first();
        return view('petugas.petugas-edit',compact('petugas'));
    }


    public function update(Request $request, $id){
         // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'jabatan' => 'required',
            'tlp' => 'required|numeric',
            'alamat' => 'required|max:100',
        ]);
        $petugas = Petugas::where('id',$id)->first();
        $petugas->update($request->all());
        return redirect ('petugas')->with('status','Data berhasil di update');
    }

    public function delete($id)
    {
        $petugas = Petugas::where('id',$id)->first();
        $petugas->delete();
        return redirect ('petugas')->with('status','Data berhasil di hapus');
    }
}
