@extends('layouts.tournament')
@section('player-info')
    <div class="section-title single-player" style="background:url('{{asset('assets/frontend/images/x7mui11504714878.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Player Profile</h1>
                </div>
                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Players</li>
                            <li>{{$player->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-info">

        <!-- Single Team Tabs -->
        <div class="single-player-tabs">
            <div class="container">
                <div class="row">
                    <!-- Side info single team-->
                    <div class="col-lg-4 col-xl-3">

                        <div class="item-player single-player">
                            <div class="head-player">
                                <img src="{{$player->thumb_pic}}" alt="location-team">
                            </div>
                            <div class="info-player">
                                <span class="number-player">
                                    {{$player->id}}
                                </span>
                                <h4>
                                    {{$player->name}}
                                    <span>{{$player->position}}</span>
                                </h4>
                                <ul>
                                    <li>
                                        <strong>CLUB NAME:</strong> <span> {{$player->team_name}} </span>
                                    </li><li><strong>Date Of Signing:</strong> <span>{{$player->date_of_signing}}</span></li>
                                    <li><strong>Team:</strong> <span>{{$player->team_name}}</span></li>
                                    {{--<li><strong>AGE:</strong> <span>28</span></li>--}}
                                    {{--<li><strong>Goals:</strong> <span>108</span></li>--}}
                                    {{--<li><strong>Discipline:</strong> <span>4 fouls against</span></li>--}}
                                    {{--<li><strong>Passing:</strong> <span>40 free kicks</span></li>--}}
                                </ul>

                                <h6>Follow {{$player->name}}</h6>

                                <ul class="social-player">
                                    <li>
                                        <div>
                                            <a href="{{$player->facebook}}" class="facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="{{$player->twitter}}" class="twitter-icon">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="{{$player->intagram}}" class="intagram">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div>
                                    </li>


                                </ul>
                                <ul class="player-fav-ul">

                                    @if(Auth::user())
                                        @if( $player->favorite->count() > 0)
                                            @foreach($player->favorite as $favorites)
                                                @if($favorites->user_id == Auth::user()->id && $player->id == $favorites->team_id)

                                                    <button data-id="{{$favorites->id}}" class="btn btn-outline-primary favorite-remove-btn">
                                                        Remove Favorite
                                                    </button>

                                                @endif
                                            @endforeach
                                                @if(\App\Models\Favorite::where('user_id',Auth::user()->id)->where('player_id',$player->id)->count() == 0)
                                                    <button data-id="{{$player->id}}" data-user="{{Auth::user()->id}}" data-type="player" data-token="{{ csrf_token() }}" class="btn btn-outline-danger favorite-btn">
                                                        Add Favorite
                                                    </button>
                                                @endif


                                        @else

                                            <button data-id="{{$player->id}}" data-user="{{Auth::user()->id}}" data-type="player" data-token="{{ csrf_token() }}" class="btn btn-outline-light favorite-btn">
                                                Add Favorite
                                            </button>

                                        @endif
                                        <button data-id="{{$player->id}}" data-user="{{Auth::user()->id}}" data-type="player" data-token="{{ csrf_token() }}" class="btn btn-outline-light hide-fav-add favorite-btn">
                                            Add Favorite
                                        </button>



                                        <button class="btn btn-outline-primary  hide-fav-remove favorite-remove-btn">
                                            Remove Favorite
                                        </button>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Attack -->
                        <div class="panel-box">
                            <div class="titles no-margin">
                                <h4><i class="fa fa-user"></i>Personal Info</h4>
                            </div>
                            <ul class="list-panel">
                                <li><p>Weight:  <span>{{$player->weight}}</span></p></li>
                                <li><p>Height:  <span>{{$player->height}}</span></p></li>
                                <li><p>Nationality:  <span>{{$player->nationality}}</span></p></li>
                                <li><p>Place of Birth:  <span>{{$player->birth_place}}</span></p></li>
                                <li><p>Date of Birth:  <span>{{$player->date_of_birth}}</span></p></li>
                                <li><p>Income:  <span>{{$player->income}}</span></p></li>
                            </ul>
                        </div>
                        <!-- End Attack -->
                    </div>
                    <!-- end Side info single team-->

                    <div class="col-lg-8 col-xl-9">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                            <li><a href="#career" data-toggle="tab">CAREER</a></li>
                            <li><a href="#stats" data-toggle="tab">STATS</a></li>
                        </ul>
                        <!-- End Nav Tabs -->

                        <!-- Content Tabs -->
                        <div class="tab-content">
                            <!-- Tab One - overview -->
                            <div class="tab-pane active" id="overview">

                                <div class="panel-box padding-b">
                                    <div class="titles">
                                        <h4>{{$player->name}} overview</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-4">
                                            <img src="{{$player->profile_pic}}" alt="">
                                        </div>

                                        <div class="col-lg-12 col-xl-8">
                                            <p>{{$player->description}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!--Items Club News -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Latest Player News</h3>
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


                                <!--Items Club video -->
                                <div class="row no-line-height">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Latest Player Videos</h3>
                                    </div>

                                    <!--Item Club News -->
                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Widget Text-->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><a href="#">Eliminatory to the world.</a></h4>
                                            </div>
                                            <iframe class="video" src="https://www.youtube.com/embed/Ln8rXkeeyP0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
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
                                            <iframe class="video" src="https://www.youtube.com/embed/Z5cackyUfgk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
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
                                            <iframe class="video" src="https://www.youtube.com/embed/hW3hnUoUS0k" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                                        </div>
                                        <!-- End Widget Text-->
                                    </div>
                                    <!--End Item Club News -->
                                </div>
                                <!--End Items Club video -->

                                <!--Sponsors CLub -->
                                <div class="row no-line-height">
                                    <div class="col-md-12">
                                        <h3 class="clear-title">Sponsors Player</h3>
                                    </div>
                                </div>
                                <!--End Sponsors CLub -->


                            </div>
                            <!-- Tab One - overview -->

                            <!-- Tab Theree - career -->
                            <div class="tab-pane" id="career">
                                <div class="col-lg-12">
                                    <table class="table-striped table-responsive table-hover career">
                                        <thead>
                                        <tr>
                                            <th>Season</th>
                                            <th>Club</th>
                                            <th>Apps(Subs)</th>
                                            <th>Goals</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/colombia.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/japan.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/bra.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/arg.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/uru.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/nga.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/mex.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/rusia.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/aus.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2017/2018
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/frontend/images/clubs-logos/arabia.png')}}" alt="icon1">
                                                Japan
                                            </td>
                                            <td>22(0)</td>
                                            <td>
                                                50
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Tab Theree - career -->

                            <!-- Tab Theree - stats -->
                            <div class="tab-pane" id="stats">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="stats-info">
                                            <ul>
                                                <li>
                                                    Appearances
                                                    <h3>50</h3>
                                                </li>

                                                <li>
                                                    Goals
                                                    <h3>10</h3>
                                                </li>

                                                <li>
                                                    Wins
                                                    <h3>16</h3>
                                                </li>

                                                <li>
                                                    Losses
                                                    <h3>5</h3>
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
                                                <h4><i class="fa fa-calendar"></i>Attack</h4>
                                            </div>
                                            <ul class="list-panel">
                                                <li><p>Goals <span>60</span></p></li>
                                                <li><p>Goals Per Match <span>1.37</span></p></li>
                                                <li><p>Shots <span>4,621</span></p></li>
                                                <li><p>Shooting Accuracy % <span>32%</span></p></li>
                                                <li><p>Penalties Scored <span>30</span></p></li>
                                                <li><p>Big Chances Created <span>293</span></p></li>
                                                <li><p>Hit Woodwork <span>107</span></p></li>
                                            </ul>
                                        </div>
                                        <!-- End Attack -->
                                    </div>

                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Attack -->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><i class="fa fa-calendar"></i>Team Play</h4>
                                            </div>
                                            <ul class="list-panel">
                                                <li><p>Passes <span>140,417</span></p></li>
                                                <li><p>Passes Per Match <span>162.14</span></p></li>
                                                <li><p>Pass Accuracy % <span>76%</span></p></li>
                                                <li><p>Crosses <span>8,148</span></p></li>
                                                <li><p>Cross Accuracy % <span>22%</span></p></li>
                                            </ul>
                                        </div>
                                        <!-- End Attack -->
                                    </div>

                                    <div class="col-lg-6 col-xl-4">
                                        <!-- Attack -->
                                        <div class="panel-box">
                                            <div class="titles no-margin">
                                                <h4><i class="fa fa-calendar"></i>Defence</h4>
                                            </div>
                                            <ul class="list-panel">
                                                <li><p>Clean Sheets <span>226</span></p></li>
                                                <li><p>Goals Conceded <span>1,170</span></p></li>
                                                <li><p>Goals Conceded Per Match <span>1.35</span></p></li>
                                                <li><p>Saves <span>392</span></p></li>
                                                <li><p>Tackles <span>7,438</span></p></li>
                                                <li><p>Tackle Success % <span>75%</span></p></li>
                                                <li><p>Blocked Shots <span>1,208</span></p></li>
                                                <li><p>Interceptions <span>5,334</span></p></li>
                                                <li><p>Clearances <span>11,436</span></p></li>
                                                <li><p>Headed Clearance <span>3,710</span></p></li>
                                                <li><p>Aerial Battles/Duels Won <span>25,401</span></p></li>
                                                <li><p>Errors Leading To Goal <span>59</span></p></li>
                                                <li><p>Own Goals <span>27</span></p></li>
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
                </div>
            </div>
        </div>
        <!-- Single Team Tabs -->


        <!-- End Newsletter -->
    </div>
@endsection