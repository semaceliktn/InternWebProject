@php
$homebanner=\App\Models\Banner::find(1);
@endphp

<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    <img src="{{$homebanner->resim}}" alt="">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>{{$homebanner->baslik}}</span></h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">{{$homebanner->alt_baslik}}</p>
                    <a href="{{$homebanner->url}}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">Daha fazla...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">Aşağı in</a>
    </div>
    <div class="banner__video">
        <a href="{{$homebanner->video_url}}" class="popup-video"><i class="fas fa-play"></i></a>
    </div>

</section>
