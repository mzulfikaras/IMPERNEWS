@extends('user.master-user')
@section('title', 'KATEGORI BERITA')
@section('kategori', 'active')

@section('main')
     <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content text-center">
                  {{-- <h4>Semua Berita</h4> --}}
                  <h2>Kategori Berita {{$kategori->kategori}}</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
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
                          <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
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
                        @foreach ($dataBerita as $data)
                        <div class="col-lg-6">
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
                                <p> {!! \Illuminate\Support\Str::limit(strip_tags($data->isi_berita), 100) !!}
                                    @if (strlen(strip_tags($data->isi_berita)) > 100)
                                      <a href="{{route('user.berita.details', $data->id)}}" style="color: red">Read More</a>
                                    @endif
                                </p>
                                <div class="post-options">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
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
                        <ul class="page-numbers">
                          <li>{!! $dataBerita->links() !!}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                @include('user.layouts.sidebar')
              </div>
            </div>
          </section>
@endsection
