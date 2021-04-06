@extends('admin.master-admin')
@section('title', 'Balas Komentar Berita')
@section('berita', 'active')
@section('main')
<div class="row" style="padding-top: 50px">
    <div class="col-lg-12">
        <h3>Balas Komentar Berita</h3>
        <hr>
        <form action="{{route('admin.komentarBerita.balasKomentar', $komentar->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="berita_id" value="{{old('berita_id', $komentar->berita_id)}}">
            <input type="hidden" name="nama_user" value="{{old('nama_user', $komentar->nama_user)}}">
            <input type="hidden" name="email_user" value="{{old('email_user', $komentar->email_user)}}">
            <input type="hidden" name="komentar_user" value="{{old('komentar_user', $komentar->komentar_user)}}">
            <div class="form-group">
              <label for="komentar">Balasan Komentar Berita</label>
              <input type="text" class="form-control" id="komentar" name="komentar_admin" value="{{old('komentar_admin', $komentar->komentar_admin)}}">
              @error('komentar')
                <div class="text-danger">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
