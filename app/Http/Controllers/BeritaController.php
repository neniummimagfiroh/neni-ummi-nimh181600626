<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\kategoriBerita;

class BeritaController extends Controller
{
    public function index(){
        $listBerita=Berita::all();
        return view('berita.index', compact('listBerita'));
    }

    public function show($id){
        $berita=Berita::find($id);
        return view('berita.show', compact('berita'));
    }
    public function create(){
        $kategoriBerita=KategoriBerita::pluck('nama','id');
        

        return view('berita.create',compact('kategoriBerita'));
    }

    public function store(request $requirest){
        $input= $requirest->all();

        Berita::create($input);

        return redirect(route('berita.index'));
    }
}
