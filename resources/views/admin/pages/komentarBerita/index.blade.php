@extends('admin.master-admin')
@section('title', 'Index Komentar Berita')
@section('berita', 'active')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Index Komentar Berita</h1>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Index Komentar Berita
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Berita</th>
                                <th>Nama User</th>
                                <th>Email User</th>
                                <th>Komentar User</th>
                                <th>Komentar Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKomentar as $data)
                                <tr class="odd gradeX">
                                    <td>{{$data->berita->judul}}</td>
                                    <td>{{$data->nama_user}}</td>
                                    <td>{{$data->email_user}}</td>
                                    <td>{{$data->komentar_user}}</td>
                                    @if (empty($data->komentar_admin))
                                        <td><a href="{{route('admin.komentarBerita.balas', $data->id)}}" class="btn btn-warning">Balas Komentar</a></td>
                                    @else
                                        <td>{{ $data->komentar_admin }}</td>
                                    @endif
                                    <td>
                                        <form action="{{route('admin.komentarBerita.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
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
