@extends('user.master-user')
@section('title', 'HOME')
@section('home', 'active')
@section('main')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">
          <div class="owl-banner owl-carousel">
            <div class="item">
              <img src="assets/images/banner-item-01.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Fashion</span>
                  </div>
                  <a href="post-details.html"><h4>Morbi dapibus condimentum</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 12, 2020</a></li>
                    <li><a href="#">12 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/banner-item-02.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Nature</span>
                  </div>
                  <a href="post-details.html"><h4>Donec porttitor augue at velit</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 14, 2020</a></li>
                    <li><a href="#">24 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/banner-item-03.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Lifestyle</span>
                  </div>
                  <a href="post-details.html"><h4>Best HTML Templates on TemplateMo</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 16, 2020</a></li>
                    <li><a href="#">36 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/banner-item-04.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Fashion</span>
                  </div>
                  <a href="post-details.html"><h4>Responsive and Mobile Ready Layouts</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 18, 2020</a></li>
                    <li><a href="#">48 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/banner-item-05.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Nature</span>
                  </div>
                  <a href="post-details.html"><h4>Cras congue sed augue id ullamcorper</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 24, 2020</a></li>
                    <li><a href="#">64 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/banner-item-06.jpg" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Lifestyle</span>
                  </div>
                  <a href="post-details.html"><h4>Suspendisse nec aliquet ligula</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 26, 2020</a></li>
                    <li><a href="#">72 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
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


      <section class="blog-posts">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                    @foreach ($dataBerita as $data)
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <div class="blog-thumb">
                              <img src="{{Storage::url($data->gambar)}}" alt="">
                            </div>
                            <div class="down-content">
                              <span>{{$data->kategori->kategori}}</span>
                              <a href="{{route('user.berita.details', $data->id)}}"><h4>{{$data->judul}}</h4></a>
                              <ul class="post-info">
                                <li><a href="#">{{$data->author}}</a></li>
                                <li><a href="#">{{date('j M Y', strtotime($data->created_at))}}</a></li>
                              </ul>
                              <p> {!! \Illuminate\Support\Str::limit(strip_tags($data->isi_berita), 300) !!}
                                @if (strlen(strip_tags($data->isi_berita)) > 300)
                                  <a href="{{route('user.berita.details', $data->id)}}" style="color: red">Read More</a>
                                @endif
                              </p>
                              <div class="post-options">
                                <div class="row">
                                  <div class="col-6"></div>
                                  <div class="col-6">
                                    <ul class="post-share">
                                      <li><i class="fa fa-share-alt"></i></li>
                                      <li><a href="#">Facebook</a>,</li>
                                      <li><a href="#">Instagram</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="{{route('user.berita')}}">Lihat Semua Berita</a>
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
