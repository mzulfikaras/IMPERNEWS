<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
        <div class="col-lg-12">
          <div class="sidebar-item search">
            <form id="search_form" name="gs" method="get" action="{{route('user.berita.cari')}}">
                @csrf
              <input type="text" name="judul" class="searchText" placeholder="Cari Berita" autocomplete="on">
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h2>Berita Terbaru</h2>
            </div>
            <div class="content">
              <ul>
                  @foreach ($dataBerita as $data)
                    <li><a href="{{route('user.berita.details', $data->id)}}">
                      <h5>{{$data->judul}}</h5>
                      <span>{{date('j M Y', strtotime($data->created_at))}}</span>
                    </a></li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Daftar Kategori</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($dataKategori as $data)
                    <li><a href="{{route('user.berita.kategori', $data->id)}}">{{$data->kategori}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
