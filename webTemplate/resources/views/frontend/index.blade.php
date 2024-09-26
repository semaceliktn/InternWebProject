@extends('frontend.main_master')


<!-- banner-area -->
@include('frontend.anasayfa.banner')
<!-- banner-area-end -->


@section('main')
<!-- about-area -->
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/xd_light.png')}}" alt="XD">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/xd.png')}}" alt="XD">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/skeatch_light.png')}}" alt="Skeatch">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/skeatch.png')}}" alt="Skeatch">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/illustrator_light.png')}}" alt="Illustrator">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/illustrator.png')}}" alt="Illustrator">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/hotjar_light.png')}}" alt="Hotjar">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/hotjar.png')}}" alt="Hotjar">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/invision_light.png')}}" alt="Invision">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/invision.png')}}" alt="Invision">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/photoshop_light.png')}}" alt="Photoshop">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/photoshop.png')}}" alt="Photoshop">
                    </li>
                    <li>
                        <img class="light" src="{{asset('frontend/assets/img/icons/figma_light.png')}}" alt="Figma">
                        <img class="dark" src="{{asset('frontend/assets/img/icons/figma.png')}}" alt="Figma">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">I have transform your ideas into remarkable digital products</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>20+ Years Experience In this game, Means <br> Product Designing</p>
                        </div>
                    </div>
                    <p class="desc">I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->

<!-- services-area -->
@include('frontend.anasayfa.random_kategori')
<!-- services-area-end -->

<!-- work-process-area -->
<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Working Process</span>
                    <h2 class="title">A clear product design process is the basis of success</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 01</span>
                    <div class="work__process__icon">
                        <img class="light" src="assets/img/icons/wp_light_icon01.png" alt="">
                        <img class="dark" src="assets/img/icons/wp_icon01.png" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Discover</h4>
                        <p>Initial ideas or inspiration & Establishment of user needs.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 02</span>
                    <div class="work__process__icon">
                        <img class="light" src="assets/img/icons/wp_light_icon02.png" alt="">
                        <img class="dark" src="assets/img/icons/wp_icon02.png" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Define</h4>
                        <p>Interpretation & Alignment of findings to project objectives.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 03</span>
                    <div class="work__process__icon">
                        <img class="light" src="assets/img/icons/wp_light_icon03.png" alt="">
                        <img class="dark" src="assets/img/icons/wp_icon03.png" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Develop</h4>
                        <p>Design-Led concept and Proposals hearted & assessed</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 04</span>
                    <div class="work__process__icon">
                        <img class="light" src="assets/img/icons/wp_light_icon04.png" alt="">
                        <img class="dark" src="assets/img/icons/wp_icon04.png" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Deliver</h4>
                        <p>Process outcomes finalised & Implemented</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- work-process-area-end -->

<!-- portfolio-area -->
@include('frontend.anasayfa.coklu')
<!-- portfolio-area-end -->

<!-- partner-area -->
<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    <li>
                        <img class="light" src="assets/img/icons/partner_light01.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_01.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light02.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_02.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light03.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_03.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light04.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_04.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light05.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_05.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light06.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_06.png" alt="">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                    </div>
                    <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile apps in different industries and verticals. Eventually, I decided that it would be a fun challenge to try designing and building my own.</p>
                    <a href="contact.html" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- partner-area-end -->

<!-- testimonial-area -->
<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    <li><img src="assets/img/images/testi_img01.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img02.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img03.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img04.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img05.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img06.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img07.png" alt=""></li>
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->

<!-- blog-area -->
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb01.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Story</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's new in design</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb02.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Social</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">Make communication Fast and Effectively.</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb03.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Work</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">How to increase your productivity at work - 2021</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->

@endsection
