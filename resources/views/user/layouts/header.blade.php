    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg fixed-top">
          <div class="container">
            <a class="navbar-brand" href="{{route('user.home')}}"><h2>ImperNews<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('home')">
                  <a class="nav-link" href="{{route('user.home')}}">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @yield('berita')" href="{{route('user.berita')}}">Semua Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link @yield('kategori')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Kategori Berita
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($dataKategori as $data)
                        <a class="dropdown-item" href="{{route('user.berita.kategori', $data->id)}}">{{$data->kategori}}</a>
                      @endforeach
                    </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link @yield('kontak')" href="{{route('user.kontak')}}">Kontak Kami</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

