@extends('admin.master-admin')
@section('title', 'Edit Berita')
@section('berita', 'active')

@section('main')
<div class="row" style="padding-top: 50px">
    <div class="col-lg-12">
        <h3>Edit Berita</h3>
        <hr>
        <form action="{{route('admin.berita.update', $berita->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="judul">Judul Berita</label>
              <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul', $berita->judul)}}">
              @error('judul')
                <div class="text-danger">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
                <label for="author">Author Berita</label>
                <input type="text" class="form-control" id="author" name="author" value="{{old('author', $berita->author)}}">
                @error('author')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori Berita</label>
                <select name="kategori_id" class="form-control">
                    <option disabled="disabled" selected="selected">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{$k->id}}" {{(old('kategori_id') ?? $berita->kategori_id == $k->id) ? 'selected' : ''}}>
                                {{$k->kategori}}
                            </option>
                        @endforeach
                </select>

                @error('kategori_id')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Berita</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>

            <div class="form-group">
                <label for="isi_berita">Isi Berita</label>
                <textarea name="isi_berita" class="form-control" id="isi_berita" cols="30" rows="10">{{old('isi_berita', $berita->isi_berita)}}</textarea>
                @error('isi_berita')
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

@section('js')
    <script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'isi_berita' );
    </script>
@endsection
