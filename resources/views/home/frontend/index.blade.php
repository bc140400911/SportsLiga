@extends('layouts.main')
<!-- section-hero-posts-->
@section('slider')
    <div class="hero-header">
        <!-- Hero Slider-->
        <div id="hero-slider" class="hero-slider">

            <!-- Item Slide-->

            <div class="item-slider" style="background:url({{asset('assets/frontend/images/slide/slide1.jpg')}});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="info-slider">
                                <h1>Group Stage Breakdown</h1>
                                <p>While familiar with fellow European nation France, Hareide admits that South American side Peru.</p>
                                <a href="#" class="btn-iw outline">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item Slide-->

            <!-- Item Slide-->
            <div class="item-slider" style="background:url({{asset('assets/frontend/images/slide/slide3.jpg')}});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="info-slider">
                                <h1>World Cup rivalries reprised</h1>
                                <p>The outdoor exhibition on Manezhnaya Square comprises 11 figures that symbolise the main sites of interest.</p>
                                <a href="#" class="btn-iw outline">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item Slide-->

            <!-- Item Slide-->
            <div class="item-slider" style="background:url({{asset('assets/frontend/images/slide/slide2.jpg')}});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="info-slider">
                                <h1>Group Stage Breakdown</h1>
                                <p>While familiar with fellow European nation France, Hareide admits that South American side Peru.</p>
                                <a href="#" class="btn-iw outline">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item Slide-->

        </div>
        <!-- End Hero Slider-->
    </div>
@endsection
<!-- End section-hero-posts-->

<!-- Section Area - Content Central -->
@section('football-news')
    <section class="content-info">

        <!-- Content Central -->
        <div class="container padding-top">
            <div class="row">

                <!-- content Column Left -->
                <div class="col-lg-6 col-xl-7">
                    <!-- Recent Post -->
                    <div class="panel-box">

                        <div class="titles">
                            <h4>Football News</h4>
                        </div>

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/1.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href=" ">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href = " ">Group Stage Breakdown</a></h5>
                                    <span class="data-info">January 3, 2014  / <i class="fa fa-comments"></i><a href="#">0</a></span>
                                    <p>While familiar with fellow European nation France, Hareide admits that South American side Peru.<a href = " ">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/2.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href = " ">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href = " ">Russia 2018’s potential classic match-ups</a></h5>
                                    <span class="data-info">January 9, 2014  / <i class="fa fa-comments"></i><a href="#">5</a></span>
                                    <p>Our goal is very clear, it didn’t change after the draw. We should qualify for the knockout stage.<a href = " ">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/3.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href = " ">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href = " ">World Cup rivalries reprised</a></h5>
                                    <span class="data-info">January  4, 2014  / <i class="fa fa-comments"></i><a href="#">3</a></span>
                                    <p>The outdoor exhibition on Manezhnaya Square comprises 11 figures that symbolise the main sites of interest.<a href = " ">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/4.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href = " ">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href = " ">All set for your trip to Russia?</a></h5>
                                    <span class="data-info">January 8, 2014  / <i class="fa fa-comments"></i><a href="#">2</a></span>
                                    <p>Colombia play Japan on 19 June at the Mordovia Arena, where the piling and casting operations.<a href = " ">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->
                    </div>
                    <!-- End Recent Post -->

                    <!-- Experts -->
                    <div class="panel-box">
                        <div class="titles">
                            <h4>Best Players</h4>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/1.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#">Cristiano Ronaldo</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/2.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#">Lionel Messi</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/3.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#">Neymar</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/4.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#">Luis Suárez</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/5.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#"> Gareth Bale</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href = "#">
                                        <img src="{{asset('assets/frontend/images/players/6.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href = "#">Sergio Agüero</a></h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Experts -->
                </div>
                <!-- End content Left -->

                <!-- content Sidebar Center -->
                <aside class="col-sm-6 col-lg-3 col-xl-3">
                    <!-- Locations -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Locations</h4>
                        </div>
                        <!-- Locations Carousel -->
                        <ul class="single-carousel">
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/1.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Saint Petersburg</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla  sit amet, consectetur adipisicing elit, pariatur.</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/2.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Ekaterinburg</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/3.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Nizhny Novgorod</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </li>
                        </ul>
                        <!-- Locations Carousel -->
                    </div>
                    <!-- End Locations -->

                    <!-- Video presentation -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Presentation</h4>
                        </div>
                        <!-- Locations Video -->
                        <div class="row">
                            <iframe src="https://www.youtube.com/embed/AfOlAUd7u4o" class="video"></iframe>
                            <div class="info-panel">
                                <h4>Rio de Janeiro</h4>
                                <p>Lorem ipsum dolor sit amet, sit amet, consectetur adipisicing elit, elit, incididunt ut labore et dolore magna aliqua sit amet, consectetur adipisicing elit,</p>
                            </div>
                        </div>
                        <!-- End Locations Video -->
                    </div>
                    <!-- End Video presentation-->

                    <!-- Widget img-->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Widget Image</h4>
                        </div>
                        <img src="{{asset('assets/frontend/images/slide/1.jpg')}}" alt="">
                        <div class="row">
                            <div class="info-panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  ut sit amet, consectetur adipisicing elit, labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget img-->
                </aside>
                <!-- End content Sidebar Center -->

                <!-- content Sidebar Right -->
                <aside class="col-sm-6 col-lg-3 col-xl-2">
                    <!-- Diary -->
                    <div class="panel-box">
                        <div class="titles">
                            <h4><i class="fa fa-calendar"></i>Diary</h4>
                        </div>

                        <!-- List Diary -->
                        <ul class="list-diary">
                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP A <span>14 JUN 2018 - 18:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/rusia.png')}}" alt="">
                                        <span>RUSSIA</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/arabia.png')}}" alt="">
                                        <span>SAUDI ARABIA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP E <span>22 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/bra.png')}}" alt="">
                                        <span>BRAZIL</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/costa-rica.png')}}" alt="">
                                        <span>COSTA RICA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP H <span>19 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="">
                                        <span>COLOMBIA</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/japan.png')}}" alt="">
                                        <span>JAPAN</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP C <span>16 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/fra.png')}}" alt="">
                                        <span>FRANCE</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/aus.png')}}" alt="">
                                        <span>AUSTRALIA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->
                        </ul>
                        <!-- End List Diary -->
                    </div>
                    <!-- End Diary -->

                    <!-- Adds Sidebar -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4><i class="fa fa-link"></i>Cta</h4>
                        </div>
                        <a href="http://themeforest.net/user/iwthemes/portfolio?ref=iwthemes" target="_blank">
                            <img src="{{asset('assets/frontend/images/adds/sidebar.png')}}" class="img-responsive" alt="">
                        </a>
                    </div>
                    <!-- End Adds Sidebar -->
                </aside>
                <!-- End content Sidebar Right -->

            </div>
        </div>
        <!-- End Content Central -->
        <!-- End Newsletter -->
    </section>
@endsection


@section('cricket-news')
    <section class="content-info">

        <!-- Content Central -->
        <div class="container padding-top">
            <div class="row">

                <!-- content Column Left -->
                <div class="col-lg-6 col-xl-7">
                    <!-- Recent Post -->
                    <div class="panel-box">

                        <div class="titles">
                            <h4>Cricket News</h4>
                        </div>

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/locations/stadium.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href="#">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href="">Group Stage Breakdown</a></h5>
                                    <span class="data-info">January 3, 2014  / <i class="fa fa-comments"></i><a href="#">0</a></span>
                                    <p>While familiar with fellow European nation France, Hareide admits that South American side Peru.<a href="">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/inzi.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href="">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href="">Russia 2018’s potential classic match-ups</a></h5>
                                    <span class="data-info">January 9, 2014  / <i class="fa fa-comments"></i><a href="#">5</a></span>
                                    <p>Our goal is very clear, it didn’t change after the draw. We should qualify for the knockout stage.<a href="">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/afridi.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href="">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href="">World Cup rivalries reprised</a></h5>
                                    <span class="data-info">January  4, 2014  / <i class="fa fa-comments"></i><a href="#">3</a></span>
                                    <p>The outdoor exhibition on Manezhnaya Square comprises 11 figures that symbolise the main sites of interest.<a href="">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->

                        <!-- Post Item -->
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/frontend/images/players/hafeez.jpg')}}" alt="" class="img-responsive">
                                        <div class="overlay"><a href="">+</a></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5><a href="">All set for your trip to Russia?</a></h5>
                                    <span class="data-info">January 8, 2014  / <i class="fa fa-comments"></i><a href="#">2</a></span>
                                    <p>Colombia play Japan on 19 June at the Mordovia Arena, where the piling and casting operations.<a href="">Read More [+]</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Item -->
                    </div>
                    <!-- End Recent Post -->

                    <!-- Experts -->
                    <div class="panel-box">
                        <div class="titles">
                            <h4>Best Players</h4>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/inzi.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href="">Inzimam Ul Haq</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/mitchell.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href="">Mitchell starc</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/afridi.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href="">Shahid Afridi</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/inzi.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href="">Inzi</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/hafeez.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href=""> Muhammad Hafeez</a></h6>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                <div class="box-info">
                                    <a href="">
                                        <img src="{{asset('assets/frontend/images/players/mitchell.jpg')}}" alt="" class="img-responsive">
                                    </a>
                                    <h6 class="entry-title"><a href="">Mitchell</a></h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Experts -->
                </div>
                <!-- End content Left -->

                <!-- content Sidebar Center -->
                <aside class="col-sm-6 col-lg-3 col-xl-3">
                    <!-- Locations -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Locations</h4>
                        </div>
                        <!-- Locations Carousel -->
                        <ul class="single-carousel">
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/stadium.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Saint Petersburg</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla  sit amet, consectetur adipisicing elit, pariatur.</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/2.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Ekaterinburg</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/images/locations/3.jpg')}}" alt="" class="img-responsive">
                                <div class="info-single-carousel">
                                    <h4>Nizhny Novgorod</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </li>
                        </ul>
                        <!-- Locations Carousel -->
                    </div>
                    <!-- End Locations -->

                    <!-- Video presentation -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Presentation</h4>
                        </div>
                        <!-- Locations Video -->
                        <div class="row">
                            <iframe src="https://www.youtube.com/embed/rMWxCETz7rI" class="video"></iframe>
                            <div class="info-panel">
                                <h4>Rio de Janeiro</h4>
                                <p>Lorem ipsum dolor sit amet, sit amet, consectetur adipisicing elit, elit, incididunt ut labore et dolore magna aliqua sit amet, consectetur adipisicing elit,</p>
                            </div>
                        </div>
                        <!-- End Locations Video -->
                    </div>
                    <!-- End Video presentation-->

                    <!-- Widget img-->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4>Widget Image</h4>
                        </div>
                        <img src="{{asset('assets/frontend/images/players/mitchell.jpg')}}" alt="">
                        <div class="row">
                            <div class="info-panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  ut sit amet, consectetur adipisicing elit, labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget img-->
                </aside>
                <!-- End content Sidebar Center -->

                <!-- content Sidebar Right -->
                <aside class="col-sm-6 col-lg-3 col-xl-2">
                    <!-- Diary -->
                    <div class="panel-box">
                        <div class="titles">
                            <h4><i class="fa fa-calendar"></i>Diary</h4>
                        </div>

                        <!-- List Diary -->
                        <ul class="list-diary">
                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP A <span>14 JUN 2018 - 18:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/rusia.png')}}" alt="">
                                        <span>RUSSIA</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/arabia.png')}}" alt="">
                                        <span>SAUDI ARABIA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP E <span>22 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/bra.png')}}" alt="">
                                        <span>BRAZIL</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/costa-rica.png')}}" alt="">
                                        <span>COSTA RICA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP H <span>19 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="">
                                        <span>COLOMBIA</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/japan.png')}}" alt="">
                                        <span>JAPAN</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->

                            <!-- Item List Diary -->
                            <li>
                                <h6>GROUP C <span>16 JUN 2018 - 15:00</span></h6>
                                <ul class="club-logo">
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/fra.png')}}" alt="">
                                        <span>FRANCE</span>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/frontend/images/clubs-logos/aus.png')}}" alt="">
                                        <span>AUSTRALIA</span>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Item List Diary -->
                        </ul>
                        <!-- End List Diary -->
                    </div>
                    <!-- End Diary -->

                    <!-- Adds Sidebar -->
                    <div class="panel-box">
                        <div class="titles no-margin">
                            <h4><i class="fa fa-link"></i>Cta</h4>
                        </div>
                        <a href="http://themeforest.net/user/iwthemes/portfolio?ref=iwthemes" target="_blank">
                            <img src="{{asset('assets/frontend/images/adds/sidebar.png')}}" class="img-responsive" alt="">
                        </a>
                    </div>
                    <!-- End Adds Sidebar -->
                </aside>
                <!-- End content Sidebar Right -->

            </div>
        </div>
        <!-- End Content Central -->
        <!-- End Newsletter -->
    </section>
@endsection




