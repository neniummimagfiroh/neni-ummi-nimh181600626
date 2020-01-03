<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategoriGaleri;

class kategoriGaleriController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listKategoriGaleri=KategoriGaleri::all(); //select * from kategori_galeri

        //blade
        return view('kategori_galeri.index',compact('listKategoriGaleri'));



    }

    public function show($id){
        //Eloquent
        //$kategoriGaleri=KategoriGaleri::where('id',$id)->first();//select * from kategori_galeri where id=$id limit 1
        $kategoriGaleri=KategoriGaleri::find($id);

        if(empty($kategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view('kategori_galeri.show',compact('kategoriGaleri'));
    }
    public function create(){
        return view('kategori_galeri.create');
    }
    public function store(request $requirest){
        $input= $requirest->all();

        KategoriGaleri::create($input);

        return redirect(route('kategori_galeri.index'));
    }
    public function edit($id){
        $kategoriGaleri=KategoriGaleri::find($id);

        if(empty($kategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view('kategori_galeri.edit', compact('kategoriGaleri'));

    }

    public function update($id,request $requirest){
        $kategoriGaleri=KategoriGaleri::find($id);
        $input= $requirest->all();

        if(empty($kategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        $kategoriGaleri->update($input);

        return redirect(route('kategori_galeri.index'));
    }
}
