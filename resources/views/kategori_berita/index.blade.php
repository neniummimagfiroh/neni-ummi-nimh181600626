@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Kategori Berita</div>

                <div class="card-body">
                <a href="{!! route('kategori_berita.create') !!}" class="btn btn-primary">Tambah Data</a>
                <table border="1">
                     <tr>
                         <td>ID</td>
                         <td >Nama</td>
                         <td>Users id</td>
                         <td>Create</td>
                         <td>Update</td>
                         <td>Aksi</td>
                     </tr>

                     @foreach($listKategoriBerita as $item)

                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->nama !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
                        <td>{!! $item->updated_at->format('d/m/Y H:i:s') !!}</td>
                        <td>
                            <a href="{!! route('kategori_berita.show',[$item->id]) !!}"class="btn btn-sm btn-success">
                            Lihat
                            </a>

                            <a href="{!! route('kategori_berita.edit',[$item->id]) !!}"class="btn btn-sm btn-warning">
                            Ubah
                            </a>
                        </td>
                    </tr>

                     @endforeach
    
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection