@extends('layouts.main')
@section('about-us')
    <!-- Section Title -->
    <div class="section-title big-title" style="background:url({{asset('assets/frontend/images/locations/3.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Page About Us</h1>
                </div>

                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Inner Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Title -->

    <!-- Section Area - Content Central -->
    <section class="content-info">

        <!-- White Section -->
        <div class="white-section paddings">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{asset('assets/frontend/images/locations/1.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-7">
                        <h4 class="subtitle">
                            <span>Sports Liga</span>
                            Who Are We?
                        </h4>
                        <p>We want you to get the most from SportsLiga. Our main goal is to keep our viewers updated with latest updates and news about there favourite sports Leagues, Teams and Players. Moreover Unregistered user can also visit SportsLiga and Registered add there favourite sports league in favourite list in get updates about them.</p>

                        <div class="row">
                            <div class="col-lg-6">
                                <h5>Our Mission</h5>
                                <p>To provide a unique platform where visiters get updates about all sports on a single place.</p>
                            </div>
                            <div class="col-lg-6">
                                <h5>Our Vision</h5>
                                <p>Update viewers with latest news of all sports. Provide matches schedules, match results, teams and players physical and professional life information.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row padding-top">
                    <div class="col-md-6 col-xl-3">
                        <div class="item-boxed-service">
                            <h4>Soccer Team </h4>
                            <p>Best Sports Features</p>
                            <a href="#"><i class="fa fa-plus-circle"></i>View More</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="item-boxed-service">
                            <h4>Club Features</h4>
                            <p>Best Sports Features</p>
                            <a href="#"><i class="fa fa-plus-circle"></i>View More</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="item-boxed-service">
                            <h4>Won cups</h4>
                            <p>Best Sports Features</p>
                            <a href="#"><i class="fa fa-plus-circle"></i>View More</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="item-boxed-service">
                            <h4>Technical body</h4>
                            <p>Best Sports Features</p>
                            <a href="#"><i class="fa fa-plus-circle"></i>View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End White Section -->

        <!-- Parallax Section -->
        <div class="parallax-section" style="background:url({{asset('assets/frontend/images/slide/3.jpg')}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h1 class="big-title">We are a great team</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Gray Section -->

        <!-- End gray Section -->
        <div class="default-section paddings">
            <div class="container">
                <div class="row">
                    <!-- Item Player -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="item-player">
                            <div class="head-player">
                                <img src="{{asset('assets/frontend/images/players/1.jpg')}}" alt="location-team">
                                <div class="overlay"><a href="#">+</a></div>
                            </div>
                            <div class="info-player">
                                        <span class="number-player">
                                            13
                                        </span>
                                <h4>
                                    Cristiano Ronaldo
                                    <span>Forward</span>
                                </h4>
                                <ul>
                                    <li>
                                        <strong>NATIONALITY</strong> <span><img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt=""> Colombia </span>
                                    </li>
                                    <li><strong>MATCHES:</strong> <span>90</span></li>
                                    <li><strong>AGE:</strong> <span>28</span></li>
                                </ul>
                            </div>
                            <a href="#" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Item Player -->

                    <!-- Item Player -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="item-player">
                            <div class="head-player">
                                <img src="{{asset('assets/frontend/images/players/2.jpg')}}" alt="location-team">
                                <div class="overlay"><a href="#">+</a></div>
                            </div>
                            <div class="info-player">
                                        <span class="number-player">
                                            10
                                        </span>
                                <h4>
                                    Lionel Messi
                                    <span>Defender</span>
                                </h4>
                                <ul>
                                    <li>
                                        <strong>NATIONALITY</strong> <span><img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt=""> Colombia </span>
                                    </li>
                                    <li><strong>MATCHES:</strong> <span>90</span></li>
                                    <li><strong>AGE:</strong> <span>28</span></li>
                                </ul>
                            </div>
                            <a href="#" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Item Player -->

                    <!-- Item Player -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="item-player">
                            <div class="head-player">
                                <img src="{{asset('assets/frontend/images/players/3.jpg')}}" alt="location-team">
                                <div class="overlay"><a href="#">+</a></div>
                            </div>
                            <div class="info-player">
                                        <span class="number-player">
                                            2
                                        </span>
                                <h4>
                                    Neymar
                                    <span>Midfielder</span>
                                </h4>
                                <ul>
                                    <li>
                                        <strong>NATIONALITY</strong> <span><img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt=""> Colombia </span>
                                    </li>
                                    <li><strong>MATCHES:</strong> <span>90</span></li>
                                    <li><strong>AGE:</strong> <span>28</span></li>
                                </ul>
                            </div>
                            <a href="#" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Item Player -->

                    <!-- Item Player -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="item-player">
                            <div class="head-player">
                                <img src="{{asset('assets/frontend/images/players/4.jpg')}}" alt="location-team">
                                <div class="overlay"><a href="#">+</a></div>
                            </div>
                            <div class="info-player">
                                        <span class="number-player">
                                            2
                                        </span>
                                <h4>
                                    Luis Suárez
                                    <span>Goalkeeper</span>
                                </h4>
                                <ul>
                                    <li>
                                        <strong>NATIONALITY</strong> <span><img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt=""> Colombia </span>
                                    </li>
                                    <li><strong>MATCHES:</strong> <span>90</span></li>
                                    <li><strong>AGE:</strong> <span>28</span></li>
                                </ul>
                            </div>
                            <a href="#" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Item Player -->
                </div>
            </div>
        </div>
        <!-- End Gray Section -->

        <!-- White Section -->
        <div class="white-section paddings">
            <div class="container">
                <!--Items Club News -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="clear-title">Latest News</h3>
                    </div>

                    <!--Item Club News -->
                    <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                            <div class="titles no-margin">
                                <h4><a href="#">World football's dates.</a></h4>
                            </div>
                            <a href="#"><img src="{{asset('assets/frontend/images/blog/1.jpg')}}" alt=""></a>
                            <div class="row">
                                <div class="info-panel">
                                    <p>Fans from all around the world can apply for 2018 FIFA World Cup™ tickets as the first window of sales.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Text-->
                    </div>
                    <!--End Item Club News -->

                    <!--Item Club News -->
                    <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                            <div class="titles no-margin">
                                <h4><a href="#">Mbappe’s year to remember</a></h4>
                            </div>
                            <a href="#"><img src="{{asset('assets/frontend/images/blog/2.jpg')}}" alt=""></a>
                            <div class="row">
                                <div class="info-panel">
                                    <p>Tickets may be purchased online by using Visa payment cards or Visa Checkout. Visa is the official.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Text-->
                    </div>
                    <!--End Item Club News -->

                    <!--Item Club News -->
                    <div class="col-lg-6 col-xl-4">
                        <!-- Widget Text-->
                        <div class="panel-box">
                            <div class="titles no-margin">
                                <h4><a href="#">Egypt are one family</a></h4>
                            </div>
                            <a href="#"><img src="{{asset('assets/frontend/images/blog/3.jpg')}}" alt=""></a>
                            <div class="row">
                                <div class="info-panel">
                                    <p>Successful applicants who have applied for supporter tickets and conditional supporter tickets will.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Text-->
                    </div>
                    <!--End Item Club News -->
                </div>
                <!--End Items Club News -->
            </div>
        </div>
        <!-- End White Section -->


        <!-- Newsletter -->
        <div class="section-newsletter no-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>Enter your e-mail and <span class="text-resalt">subscribe</span> to our newsletter.</h2>
                            <p>Duis non lorem porta,  eros sit amet, tempor sem. Donec nunc arcu, semper a tempus et, consequat.</p>
                        </div>
                        <form id="newsletterForm" action="http://html.iwthemes.com/sportscup/run/php/mailchip/newsletter-subscribe.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                        <input class="form-control" placeholder="Your Name" name="name"  type="text" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                        <input class="form-control" placeholder="Your  Email" name="email"  type="email" required="required">
                                        <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit" name="subscribe" >SIGN UP</button>
                                                 </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="result-newsletter"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Newsletter -->
    </section>
    <!-- End Section Area -  Content Central -->

    <div class="instagram-btn">
        <div class="btn-instagram">
            <i class="fa fa-instagram"></i>
            FOLLOW
            <a href="https://www.instagram.com/fifaworldcup/" target="_blank">&#64;fifaworldcup</a>
        </div>
    </div>

    <div class="content-instagram">
        <div id="instafeed"></div>
    </div>
@stop