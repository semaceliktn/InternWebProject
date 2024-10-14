@extends('frontend.main_master')

@section('main')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ $blogkategori->kategori_adi }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$blogkategori->kategori_adi}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- blog-area -->
        <section class="standard__blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        @foreach($blogpost as $icerikler)
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                <a href="{{ url('blog/kategori/'.$icerikler->id.'/'.$icerikler->url) }}">
                                    <img src="{{asset($icerikler->resim)}}" alt="">
                                </a>
                                <a href="{{ url('blog/kategori/'.$icerikler->id.'/'.$icerikler->url) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                            <div class="standard__blog__content">
                                <h2 class="title"><a href="{{ url('blog/kategori/'.$icerikler->id.'/'.$icerikler->url) }}">{{ $icerikler->baslik }}</a></h2>
                                <p>{!! Str::limit($icerikler->metin,200) !!} }</p>
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i> {{ $icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y') }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <div class="pagination-wrap">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="widget">
                                <form action="#" class="search-form">
                                    <input type="text" placeholder="Search">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Son Blog</h4>
                                <ul class="rc__post">
                                    @foreach($blogicerikler as $icerik)
                                    <li class="rc__post__item">
                                        <div class="rc__post__thumb">
                                            <a href="{{ url('blog/kategori/'.$icerik->id.'/'.$icerik->url) }}"><img src="{{asset($icerik->resim)}}" alt=""></a>
                                        </div>
                                        <div class="rc__post__content">
                                            <h5 class="title"><a href="{{ url('blog/kategori/'.$icerik->id.'/'.$icerik->url) }}">{{$icerik->baslik}}</a></h5>
                                            <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ $icerik->created_at->tz('Europe/Istanbul')->format('d.m.Y') }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Kategoriler</h4>
                                <ul class="sidebar__cat">
                                    @foreach($blogkategoriler as $kategoriler)
                                    <li class="sidebar__cat__item"><a href="{{ url('blog/kategori/'.$kategoriler->id.'/'.$kategoriler->url) }}">{{ $kategoriler->kategori_adi }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->
@endsection
