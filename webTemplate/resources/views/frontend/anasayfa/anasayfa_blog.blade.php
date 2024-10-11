@php
$icerikler=App\Models\BlogContent::where('durum',1)->orderBy('sirano','ASC')->limit(3)->get();
@endphp
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach($icerikler as $icerik)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ url('blog/icerik/'.$icerik->id.'/'.$icerik->url) }}"><img src="{{asset('frontend/assets/img/blog/blog_post_thumb01.jpg')}}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">{{ $icerik->IliskiBlogCategory->kategori_adi }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ $icerik->created_at->tz('Europe/Istanbul')->format('d.m.Y') }}</span>
                        <h3 class="title"><a href="{{ url('blog/icerik/'.$icerik->id.'/'.$icerik->url) }}">{{ $icerik->baslik }}</a></h3>
                        <a href="{{ url('blog/icerik/'.$icerik->id.'/'.$icerik->url) }}" class="read__more">Devamı...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">Tümünü gör...</a>
        </div>
    </div>
</section>



