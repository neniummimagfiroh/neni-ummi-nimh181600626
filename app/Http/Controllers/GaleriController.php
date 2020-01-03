<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\kategoriGaleri;

class GaleriController extends Controller
{
    public function index(){
        $listGaleri=Galeri::all();
        return view('galeri.index', compact('listGaleri'));
    }

    public function show($id){
        $galeri=Galeri::find($id);
        return view('galeri.show', compact('galeri'));
    }
    public function create(){
        $kategoriGaleri=KategoriGaleri::pluck('nama','id');
        

        return view('galeri.create',compact('kategoriGaleri'));
    }

    public function store(request $requirest){
        $input= $requirest->all();

        Galeri::create($input);

        return redirect(route('galeri.index'));
    }
}
