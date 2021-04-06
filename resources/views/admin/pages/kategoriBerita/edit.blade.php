@extends('admin.master-admin')
@section('title', 'Update Kategori Berita')
@section('berita', 'active')
@section('main')
<div class="row" style="padding-top: 50px">
    <div class="col-lg-12">
        <h3>Update Kategori Berita</h3>
        <hr>
        <form action="{{route('admin.kategoriBerita.update', $kategori->id )}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="kategori">Kategori Berita</label>
              <input type="text" class="form-control" id="kategori" name="kategori" value="{{old('kategori', $kategori->kategori)}}">
              @error('kategori')
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
