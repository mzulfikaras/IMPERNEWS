@extends('user.master-user')
@section('title', 'Detail Berita')
@section('berita', 'active')

@section('main')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content text-center">
                  <h2>Berita Details</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

    <!-- Banner Ends Here -->

    {{-- <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span>Stand Blog HTML5 Template</span>
                  <h4>Creative HTML Template For Bloggers!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="{{Storage::url($berita->gambar)}}" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$berita->kategori->kategori}}</span>
                      <a href="{{route('user.berita.details', $berita->id)}}"><h4>{{$berita->judul}}</h4></a>
                      <ul class="post-info">
                        <li><a href="#">{{$berita->author}}</a></li>
                        <li><a href="#">{{date('j M Y', strtotime($berita->created_at))}}</a></li>
                        <li><a href="#">{{$jumlahKomentar}} Komentar</a></li>
                      </ul>
                      <p>{!! $berita->isi_berita !!}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6"></div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>Semua Komentar</h2>
                    </div>
                    <div class="content">
                      <ul>
                          @foreach ($dataKomentar as $data)
                            <li>
                              <div class="author-thumb">
                                <img src="{{asset('assets/user/images/usericon.png')}}" alt="">
                              </div>
                              <div class="right-content">
                                <h4>{{$data->nama_user}}<span>{{date('j M Y', strtotime($data->created_at))}}</span></h4>
                                <p>{{$data->komentar_user}}</p>
                              </div>
                            </li>
                            <li class="replied">
                                @if (!empty($data->komentar_admin))
                                  <div class="author-thumb">
                                    <img src="{{asset('assets/user/images/adminicon.png')}}" alt="">
                                  </div>
                                    <div class="right-content">
                                      <h4>Admin IMPERNEWS<span>{{date('j M Y', strtotime($data->created_at))}}</span></h4>
                                      <p>{{$data->komentar_admin}}</p>
                                    </div>
                                @endif
                            </li>
                          @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                    @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Pesan!</strong> {{session('pesan')}}
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Tulis Komentar</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="{{route('user.berita.komentar')}}" method="post">
                        @csrf
                        <input type="hidden" name="berita_id" value="{{$berita->id}}">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="nama_user" type="text" id="name" placeholder="Nama" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email_user" type="text" id="email" placeholder="Email" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="komentar_user" rows="6" id="message" placeholder="Komentar" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Kirim Komentar</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('user.layouts.sidebar')
        </div>
      </div>
    </section>
@endsection
