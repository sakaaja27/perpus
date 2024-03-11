<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::all();
        $deletecate = Rak::onlyTrashed()->get();
       
        return view('rak.rak',['rak' => $rak,'viewdel' => $deletecate]);
    }

    public function store(Request $request)
    {
        // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama_rak' => 'required|unique:raks|max:100',
            'lokasi_rak' => 'required|max:100',
        ]);

        $rak = Rak::create($request->all());
        return redirect ('rak')->with('status','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $rak = Rak::where('id',$id)->first();
        return view('rak.rak-edit',compact('rak'));
    }


    public function update(Request $request, $id){
         // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama_rak' => 'required|unique:raks|max:100',
            'lokasi_rak' => 'required|max:100',
        ]);
        $rak = Rak::where('id',$id)->first();
        $rak->update($request->all());
        return redirect ('rak')->with('status','Data berhasil di update');
    }

    public function delete($id)
    {
        // deletenya pake softdelete yg ada di laravel
        $rak = Rak::where('id',$id)->first();
        $rak->delete();
        return redirect ('rak')->with('status','Data berhasil di hapus');
    }

    public function restore($id)
    {
        $rak = Rak::withTrashed()->where('id',$id)->first();
        $rak->restore();
        return redirect ('rak')->with('status','Data berhasil di pulihkan');

    }

}
