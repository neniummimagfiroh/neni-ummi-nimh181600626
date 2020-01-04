<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategoriPengumuman;

class kategoriPengumumanController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listKategoriPengumuman=KategoriPengumuman::all(); //select * from kategori_pengumuman

        //blade
        return view('kategori_pengumuman.index',compact('listKategoriPengumuman'));

    }

    public function show($id){
        //Eloquent
        //$kategoriPengumuman=KategoriPengumuman::where('id',$id)->first();//select * from kategori_pengumuman where id=$id limit 1
        $kategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($kategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        return view('kategori_pengumuman.show',compact('kategoriPengumuman'));
    }
    public function create(){
        return view('kategori_pengumuman.create');
    }
    public function store(request $requirest){
        $input= $requirest->all();

        KategoriPengumuman::create($input);

        return redirect(route('kategori_pengumuman.index'));
    }
    public function edit($id){
        $kategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($kategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        return view('kategori_pengumuman.edit', compact('kategoriPengumuman'));

    }

    public function update($id,request $requirest){
        $kategoriPengumuman=KategoriPengumuman::find($id);
        $input= $requirest->all();

        if(empty($kategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        $kategoriPengumuman->update($input);

        return redirect(route('kategori_pengumuman.index'));
    }
    public function destroy($id){
        $kategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($kategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        $kategoriPengumuman->delete();
        return redirect(route('kategori_Pengumuman'));
    }
}