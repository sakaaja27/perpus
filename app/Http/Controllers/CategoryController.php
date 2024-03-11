<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categori = Categori::all();
        
        $deletecate = Categori::onlyTrashed()->get();
       
        return view('categori.category',['categori' => $categori,'viewdel' => $deletecate]);
    }

    public function add()
    {
        return view('categori.category-add');
    }

    public function store(Request $request)
    {
        // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama' => 'required|unique:categoris|max:100',
        ]);

        $category = Categori::create($request->all());
        return redirect ('category')->with('status','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $category = Categori::where('id',$id)->first();
        return view('categori.category-edit',compact('category'));
    }

    public function update(Request $request, $id){
         // validate biar kolom nama menjadi unique 
        $validated = $request->validate([
            'nama' => 'required|unique:categoris|max:100',
        ]);
        $category = Categori::where('id',$id)->first();
        $category->update($request->all());
        return redirect ('category')->with('status','Data berhasil di update');
    }

    public function delete($id)
    {
        // deletenya pake softdelete yg ada di laravel
        $category = Categori::where('id',$id)->first();
        $category->delete();
        return redirect ('category')->with('status','Data berhasil di hapus');
    }

    public function restore($id)
    {
        $category = Categori::withTrashed()->where('id',$id)->first();
        $category->restore();
        return redirect ('category')->with('status','Data berhasil di pulihkan');

    }

    
}
