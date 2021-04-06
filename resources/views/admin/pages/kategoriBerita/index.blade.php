@extends('admin.master-admin')
@section('title', 'Index Kategori Berita')
@section('berita', 'active')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Index Kategori Berita</h1>
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
        <a href="{{route('admin.kategoriBerita.create')}}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Kategori</a>
        <div class="panel panel-default">
            <div class="panel-heading">
                Table Kategori Berita
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Kategori Berita</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKategori as $data)
                                <tr class="odd gradeX">
                                    <td>{{$data->kategori}}</td>
                                    <td class="text-center">
                                        <form action="{{route('admin.kategoriBerita.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{route('admin.kategoriBerita.edit', $data->id)}}" class="btn btn-warning">Edit</a>
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
