@extends('layouts.tournament')
@section('team-list')


    <!-- layout-->
    <div id="layout">
        <!-- Section Title -->
        <div class="section-title" style="background:url({{asset('assets/frontend/images/slide/1.jpg)')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Teams List</h1>
                    </div>

                    <div class="col-md-4">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li>Teams</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section Title -->

        <!-- Section Area - Content Central -->
        <section class="content-info">
            <div class="container padding-top">
                <div class="row portfolioContainer">
                @foreach($showTeams as $team)
                    <!-- Item Team Group A-->

                    <div class="col-md-6 col-lg-4 col-xl-3 group-a">
                        <div class="item-team">
                            <div class="head-team team-hight">

                                @foreach($team->image as $images)
                                    @if(($images->type == 'fanart1') != null)
                                        <img src="{{$images->image}}" alt="location-team">
                                    @endif

                                @endforeach
                                <div class="overlay"><a href="{{route('team-info',['tournamentId' => $tournament->id, 'id' => $team->id])}}">+</a></div>
                            </div>
                            <div class="info-team">
                                    <span class="logo-team">
                                        {{--<img src="{{$team->team_logo}}" alt="logo-team">--}}
                                        {{$team->establish_at}}
                                    </span>
                                <h4>{{$team->name}}</h4>
                                <span class="location-team">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @if(isset($team->stadium->location)){{$team->stadium->location}}@endif
                                    </span>
                                <span class="group-team">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        {{$team->country}}
                                    </span>
                            </div>
                            <a href="{{route('team-info',['tournamentId' => $tournament->id, 'id' => $team->id])}}" class="btn">Team Profile <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Item Team Group A-->
                    @endforeach

                </div>
            </div>

            <!-- Newsletter -->
            <div class="section-newsletter">
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
    </div>
    <!-- End layout-->
@stop