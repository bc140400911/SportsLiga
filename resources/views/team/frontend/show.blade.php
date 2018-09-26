@extends('layouts.tournament')
@section('single-team')
    <!-- layout-->
    <div id="layout">
        <!-- Section Title -->
        <div class="section-title-team">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="row">
                            <div class="col-md-3">
                                @foreach($teamInfo->image as $team)
                                    @if($team->type == 'badge' )
                                        <img src="{{$team->image}}" alt="img">
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-9">
                                <h1>{{$teamInfo->name}}</h1>
                                <ul class="general-info">
                                    <li><h6><strong>Foundation:</strong>@if(isset($teamInfo->establish_at))  {{$teamInfo->establish_at}} @endif</h6></li>
                                    <li><h6><strong>Country:</strong>@if(isset($teamInfo->country))  {{$teamInfo->country}} @endif</h6></li>
                                    <li><h6><strong>Manager:</strong>@if(isset($teamInfo->manager))  {{$teamInfo->manager}} @endif</h6></li>
                                    <li><h6><strong>Gander:</strong>@if(isset($teamInfo->gender))  {{$teamInfo->gender}} @endif</h6></li>
                                    <li><h6><strong>Location:</strong>@if(isset($teamInfo->stadium->location)) {{$teamInfo->stadium->location}} @endif</h6></li>
                                    <li>
                                    </li>
                                </ul>

                                <ul class="social-teams">
                                    <li>
                                        <div>
                                            <a href="#" class="facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="#" class="twitter-icon">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="#" class="youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </div>
                                    </li>

                                    <ul class="pull-right">

                                        @if(Auth::user())

                                            @if( $teamInfo->favorite->count() > 0)
                                                @foreach($teamInfo->favorite as $favorites)
                                                    @if($favorites->user_id == Auth::user()->id && $teamInfo->id == $favorites->team_id)

                                                        <button data-id="{{$favorites->id}}" class="btn btn-outline-danger favorite-remove-btn">
                                                            Remove Favorite
                                                        </button>
                                                    @endif
                                                @endforeach
                                                    @if(\App\Models\Favorite::where('user_id',Auth::user()->id)->where('team_id',$teamInfo->id)->count() == 0)
                                                        <button data-id="{{$teamInfo->id}}" data-user="{{Auth::user()->id}}" data-type="team" data-token="{{ csrf_token() }}" class="btn btn-outline-danger favorite-btn">
                                                            Add Favorite
                                                        </button>
                                                    @endif


                                            @else

                                                <button data-id="{{$teamInfo->id}}" data-user="{{Auth::user()->id}}" data-type="team" data-token="{{ csrf_token() }}" class="btn btn-outline-danger favorite-btn">
                                                    Add Favorite
                                                </button>

                                            @endif
                                            <button data-id="{{$teamInfo->id}}" data-user="{{Auth::user()->id}}" data-type="team" data-token="{{ csrf_token() }}" class="btn btn-outline-danger hide-fav-add favorite-btn">
                                                Add Favorite
                                            </button>



                                            <button class="btn btn-outline-danger hide-fav-remove favorite-remove-btn">
                                                Remove Favorite
                                            </button>
                                        @endif
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($teamInfo->image as $team)
                @if($team->type == 'fanart3' )
                 <div class="bg-image-team" style="background:url({{$team->image}});"></div>
                @endif
            @endforeach
        </div>
        <!-- End Section Title -->

        <!-- Section Area - Content Central -->
        <section class="content-info">

            <!-- Single Team Tabs -->
            <div class="single-team-tabs">
                <div class="container">
                    <div class="row">
                        <!-- Left Content - Tabs and Carousel -->
                        <div class="col-xl-12 col-md-12">
                            <!-- Nav Tabs -->
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                                <li><a href="#squad" data-toggle="tab">Squad</a></li>
                                <li><a href="#fixtures" data-toggle="tab">FIXTURES</a></li>
                                <li><a href="#results" data-toggle="tab">RESULTS</a></li>
                                <li><a href="#stats" data-toggle="tab">STATS</a></li>
                            </ul>
                            <!-- End Nav Tabs -->
                        </div>

                        <div class="col-lg-9 padding-top-mini">
                            <!-- Content Tabs -->
                            <div class="tab-content">
                                <!-- Tab One - overview -->
                                <div class="tab-pane active" id="overview">
                                    <div class="panel-box padding-b">
                                        <div class="titles">
                                            <h4>{{$teamInfo->name}}</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-4">
                                                @foreach($teamInfo->image as $team)
                                                    @if($team->type == 'fanart2' )
                                                            <img src="{{$team->image}}" alt="">
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="col-lg-12 col-xl-8">
                                                <p>{{$teamInfo->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-box padding-b">
                                        <div class="titles">
                                            <h4>Home Stadium</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-4">
                                                @foreach($teamInfo->stadium->image as $team)
                                                        <img src="{{$team->image}}" alt="">
                                                @endforeach
                                            </div>

                                            <div class="col-lg-12 col-xl-8">
                                                <h1 class="text-center">{{$teamInfo->stadium->location}}</h1>
                                                <h5 class="text-center">{{$teamInfo->stadium->description}} </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Items Club News -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="clear-title">Latest Club News</h3>
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
                                                    <h4><a href="#">Mbappe’s year</a></h4>
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


                                    <!--Items Club video -->
                                    <div class="row no-line-height">
                                        <div class="col-md-12">
                                            <h3 class="clear-title">Latest Club Videos</h3>
                                        </div>

                                        <!--Item Club News -->
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Widget Text-->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><a href="#">Eliminatory to the world.</a></h4>
                                                </div>
                                                <iframe class="video" src="https://www.youtube.com/embed/Ln8rXkeeyP0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            </div>
                                            <!-- End Widget Text-->
                                        </div>
                                        <!--End Item Club News -->

                                        <!--Item Club News -->
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Widget Text-->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><a href="#">Colombia classification</a></h4>
                                                </div>
                                                <iframe class="video" src="https://www.youtube.com/embed/Z5cackyUfgk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            </div>
                                            <!-- End Widget Text-->
                                        </div>
                                        <!--End Item Club News -->

                                        <!--Item Club News -->
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Widget Text-->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><a href="#">World Cup goal</a></h4>
                                                </div>
                                                <iframe class="video" src="https://www.youtube.com/embed/hW3hnUoUS0k" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            </div>
                                            <!-- End Widget Text-->
                                        </div>
                                        <!--End Item Club News -->
                                    </div>
                                    <!--End Items Club video -->

                                </div>
                                <!-- Tab One - overview -->
                                <!-- Tab Two - squad -->
                                <div class="tab-pane" id="squad">
                                    <div class="row">
                                    @foreach($teamInfo->player as $player)
                                        <!-- Item Player -->
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="item-player">
                                                <div class="head-player player-pic-hight">
                                                    <img src="{{$player->thumb_pic}}" alt="location-team">
                                                    <div class="overlay"><a href="">+</a></div>
                                                </div>
                                                <div class="info-player">
                                                        <span class="number-player">

                                                            @foreach($teamInfo->image as $team)
                                                                @if($team->type == 'badge')
                                                                    <?php $badge = $team->image ?>
                                                                    <img src="{{$badge}}" alt="badge">
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    <h4>
                                                        {{$player->name}}
                                                        <span>{{$player->position}}</span>
                                                    </h4>
                                                    <ul>
                                                        <li>
                                                            <strong>NATIONALITY</strong> <span>{{$player->nationality}} </span>
                                                        </li>
                                                        <li><strong>Team:</strong> <span>{{$player->team_name}}</span></li>
                                                        <li><strong>Date Of Birth:</strong> <span>{{$player->date_of_birth}}</span></li>
                                                    </ul>
                                                </div>
                                                <a href="{{route('player-info',[$tournament->id,$player->player_id])}}" class="btn">View Player <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Item Player -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Tab Two - squad -->

                                <!-- Tab Theree - fixtures -->
                                <div class="tab-pane" id="fixtures">

                                    <table class="table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Team A</th>
                                            <th class="text-center">VS</th>
                                            <th>Team B</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($match as $matches)
                                            <tr>
                                            <td>
                                                <strong>{{getTeamName($matches->first_team)}}</strong><br>
                                            </td>
                                            <td class="text-center">Vs</td>
                                            <td>
                                                <strong>{{getTeamName($matches['second_team'])}}</strong><br>
                                            </td>
                                            <td>

                                                {{$matches['start_date']}}
                                            </td>
                                            <td>
                                                {{$matches['start_time']}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- End Tauuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuub Theree - fixtures -->

                                <!-- Tab Theree - results -->
                                <div class="tab-pane" id="results">
                                    {{--<div class="recent-results results-page">--}}
                                        {{--<div class="info-results">--}}
                                            {{--<ul>--}}
                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Portugal Vs Spain <span class="date">27 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/esp.png')}}" alt="">--}}
                                                            {{--Spain--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Rusia Vs Colombia <span class="date">30 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/rusia.png')}}" alt="">--}}
                                                            {{--Rusia--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="">--}}
                                                            {{--Colombia--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Portugal Vs Spain <span class="date">27 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/esp.png')}}" alt="">--}}
                                                            {{--Spain--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Uruguay Vs Portugal <span class="date">31 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="">--}}
                                                            {{--Uruguay--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}

                                                {{--<li>--}}
                                                        {{--<span class="head">--}}
                                                            {{--Portugal Vs Spain <span class="date">27 Jun 2017</span>--}}
                                                        {{--</span>--}}

                                                    {{--<div class="goals-result">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/por.png')}}" alt="">--}}
                                                            {{--Portugal--}}
                                                        {{--</a>--}}

                                                        {{--<span class="goals">--}}
                                                                {{--<b>2</b> - <b>3</b>--}}
                                                                {{--<a href="#" class="btn theme">View More</a>--}}
                                                            {{--</span>--}}

                                                        {{--<a href="#">--}}
                                                            {{--<img src="{{asset('assets/frontend/images/clubs-logos/esp.png')}}" alt="">--}}
                                                            {{--Spain--}}
                                                        {{--</a>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <section class="content-info">

                                        <div class="container padding-top">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="recent-results results-page">
                                                        <div class="info-results">

                                                            <ul>
                                                                @foreach($score as $scores)
                                                                    <li>
                                                                        <span class="head">
                                                                        {{getTeamName($scores->team_one)}} Vs {{getTeamName($scores->team_two)}} <span class="date">27 Jun 2017</span>
                                                                        </span>

                                                                    <div class="goals-result">

                                                                            {{getTeamName($scores->team_one)}}


                                                                    <span class="goals">
                                                                        <b>{{$scores->team_one_score}}</b> - <b>{{$scores->team_two_score}}</b>
                                                                        <a href="{{route('score-info',['tournamentId' => $tournament->id ,'id'=>$scores->id])}}" class="btn theme">View More</a>
                                                                    </span>

                                                                        {{getTeamName($scores->team_two)}}

                                                                    </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Newsletter -->

                                    </section>
                                </div>
                                <!-- End Tab Theree - results -->

                                <!-- Tab Theree - stats -->
                                <div class="tab-pane" id="stats">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="stats-info">
                                                <ul>
                                                    <?php
                                                        $wins        = 0;
                                                        $loss        = 0;
                                                        $matchplayed = 0;
                                                        $goals       = 0;
                                                        $draw        = 0;
                                                        $against     = 0;
                                                        $goalsdiff   = 0;
                                                        $totalPoints = 0;
                                                    ?>
                                                    @foreach($teamInfo->standing as $team)
                                                        <?php
                                                            $wins        += $team->win;
                                                            $loss        += $team->loss;
                                                            $matchplayed += $team->played;
                                                            $goals       += $team->goalsfor;
                                                            $draw        += $team->draw;
                                                            $against     += $team->goalsagainst;
                                                            $goalsdiff   += $team->goalsdifference;
                                                            $totalPoints += $team->total;
                                                        ?>
                                                    @endforeach
                                                    <li>
                                                        Matches Played
                                                        <h3>{{$matchplayed}}</h3>
                                                    </li>

                                                    <li>
                                                        Season Played
                                                        <h3>{{11}}</h3>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Winings</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total wins <span>{{$wins}}</span></p></li>

                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>

                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Losses</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Losses <span>{{$loss}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>

                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Draw</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Draw <span>{{$draw}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Goals</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Goals <span>{{$goals}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Goals Against</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Againts Goals <span>{{$against}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>
                                        <div class="col-lg-6 col-xl-4">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Goals difference</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Goals differences <span>{{$goalsdiff}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>

                                        <div class="col-lg-12 col-xl-12">
                                            <!-- Attack -->
                                            <div class="panel-box">
                                                <div class="titles no-margin">
                                                    <h4><i class="fa fa-calendar"></i>Points</h4>
                                                </div>
                                                <ul class="list-panel">
                                                    <li><p>Total Points <span>{{$totalPoints}}</span></p></li>
                                                </ul>
                                            </div>
                                            <!-- End Attack -->
                                        </div>

                                    </div>

                                </div>
                                <!-- End Tab Theree - stats -->
                            </div>
                            <!-- Content Tabs -->
                        </div>

                        <!-- Side info single team-->
                        <div class="col-lg-3 padding-top-mini">
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

                            <!-- Widget Text-->
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
                            <!-- End Widget Text-->
                        </div>
                        <!-- end Side info single team-->

                    </div>
                </div>
            </div>
            <!-- Single Team Tabs -->

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