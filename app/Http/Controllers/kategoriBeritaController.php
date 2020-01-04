<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategoriBerita;

class kategoriBeritaController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listKategoriBerita=KategoriBerita::all(); //select * from kategori_berita

        //blade
        return view('kategori_berita.index',compact('listKategoriBerita'));

    }

    public function show($id){
        //Eloquent
        //$kategoriBerita=KategoriBerita::where('id',$id)->first();//select * from kategori_berita where id=$id limit 1
        $kategoriBerita=KategoriBerita::find($id);

        if(empty($kategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        return view('kategori_berita.show',compact('kategoriBerita'));
    }
    public function create(){
        return view('kategori_berita.create');
    }
    public function store(request $requirest){
        $input= $requirest->all();

        KategoriBerita::create($input);

        return redirect(route('kategori_berita.index'));
    }
    
    public function edit($id){
        $kategoriBerita=KategoriBerita::find($id);

        if(empty($kategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        return view('kategori_berita.edit', compact('kategoriBerita'));

    }

    public function update($id,request $requirest){
        $kategoriBerita=KategoriBerita::find($id);
        $input= $requirest->all();

        if(empty($kategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        $kategoriBerita->update($input);

        return redirect(route('kategori_berita.index'));
    }

    public function destroy($id){
        $kategoriBerita=KategoriBerita::find($id);

        if(empty($kategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        $kategoriBerita->delete();
        return redirect(route('kategori_berita'));
    }
}
