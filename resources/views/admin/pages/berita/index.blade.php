@extends('admin.master-admin')
@section('title', 'Index Berita')
@section('berita', 'active')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Index Berita</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-12">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Pesan!</strong> {{session('pesan')}}
        </div>
        @endif
        @if (session('hapus'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Hapus!</strong> {{session('hapus')}}
            </div>
        @endif
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('admin.berita.create')}}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Berita</a>
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Index Berita
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Judul Berita</th>
                                <th>Author Berita</th>
                                <th>Kategori Berita</th>
                                <th>Gambar Berita</th>
                                <th>Isi Berita</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBerita as $data)
                                <tr class="odd gradeX">
                                    <td>{{$data->judul}}</td>
                                    <td>{{$data->author}}</td>
                                    <td>{{$data->kategori->kategori}}</td>
                                    <td>
                                        <img src="{{Storage::url($data->gambar)}}" alt="" width="150">
                                    </td>
                                    <td>{!! $data->isi_berita !!}</td>
                                    <td>
                                        <form action="{{route('admin.berita.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{route('admin.berita.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
