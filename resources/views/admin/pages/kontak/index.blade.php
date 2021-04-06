@extends('admin.master-admin')
@section('title', 'Index Kontak')
@section('kontak', 'active')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Index Kontak</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-12">
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
                Tabel Index Kontak
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Email User</th>
                                <th>Subject User</th>
                                <th>Pesan User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKontak as $data)
                                <tr class="odd gradeX">
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->subject}}</td>
                                    <td>{{ $data->pesan }}</td>
                                    <td>
                                        <form action="{{route('admin.kontak.hapus', $data->id)}}" method="post">
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
