<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denda;

class DendaController extends Controller
{
    public function index()
    {
        $denda = Denda::all();       
        return view('denda.denda',compact('denda'));
    }

    public function edit($id)
    {
        $denda = Denda::where('id',$id)->first();
        return view('denda.denda-edit',compact('denda'));
    }


    public function update(Request $request, $id){
         // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama_denda' => 'required|max:100',
        ]);
        $denda = Denda::where('id',$id)->first();
        $denda->update($request->all());
        return redirect ('denda')->with('status','Data berhasil di update');
    }
}
