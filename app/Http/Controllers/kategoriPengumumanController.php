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
}