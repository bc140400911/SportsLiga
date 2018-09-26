@extends('layouts.tournament')
@section('single-tournament')
    <!-- layout-->
    <div id="layout">
        <!-- Section Title -->
        <div class="section-title-team">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-3">
                                @foreach($tournament->image as $image)
                                    @if($image->type == 'badge')
                                        <img src="{{asset($image->image)}}" >
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-9">
                                <h1></h1>
                                <ul class="general-info">
                                    <li class="info-ai"><h6><strong>Name:</strong> {{$tournament->name}} </h6></li>
                                    <li class="info-ai"><h6><strong>Sport:</strong> {{$tournament->sport->name}} </h6></li>
                                    <li class="info-ai"><h6><strong>Estabilsh At:</strong> {{$tournament->establish_at}} </h6></li>
                                    <li class="info-ai"><h6><strong>Country:</strong> {{$tournament->country}} </h6></li>
                                    <li class="info-ai"><h6><strong>Gander:</strong> {{$tournament->gender}} </h6></li>
                                    <li class="info-ai"><h6><strong>First Event:</strong> {{$tournament->first_event}} </h6></li>
                                    <li class="info-ai"><h6><strong>Website:</strong> <a class="color-white-ai" href="http://{{$tournament->website}}">{{$tournament->website}}</a> </h6></li>
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
                                            @if( $tournament->favorite->count() > 0)
                                                @foreach($tournament->favorite as $favorites)
                                                    @if($favorites->user_id == Auth::user()->id )

                                                        <button data-id="{{$favorites->id}}" class="btn btn-outline-primary favorite-remove-btn">
                                                            Remove Favorite
                                                        </button>

                                                    @endif
                                                @endforeach
                                                        @if(\App\Models\Favorite::where('user_id',Auth::user()->id)->where('tournament_id',$tournament->id)->count() == 0)
                                                            <button data-id="{{$tournament->id}}" data-user="{{Auth::user()->id}}" data-type="tournament" data-token="{{ csrf_token() }}" class="btn btn-outline-danger favorite-btn">
                                                                Add Favorite
                                                            </button>
                                                        @endif


                                            @else

                                                <button data-id="{{$tournament->id}}" data-user="{{Auth::user()->id}}" data-type="tournament" data-token="{{ csrf_token() }}" class="btn btn-outline-light favorite-btn">
                                                    Add Favorite
                                                </button>

                                            @endif
                                            <button data-id="{{$tournament->id}}" data-user="{{Auth::user()->id}}" data-type="tournament" data-token="{{ csrf_token() }}" class="btn btn-outline-light hide-fav-add favorite-btn">
                                                Add Favorite
                                            </button>



                                            <button class="btn btn-outline-primary  hide-fav-remove favorite-remove-btn">
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
                                            <h4>Description</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-4">
                                                @foreach($tournament->image as $image)
                                                    @if($image->type == 'fanart1')
                                                        <img src="{{asset($image->image)}}" >
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="col-lg-12 col-xl-8">
                                                <p>{{$tournament->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- Content Tabs -->
                        </div>

                        <!-- Side info single team-->
                        <!-- end Side info single team-->

                    </div>

                    <div class="col-md-3 col-sm-12 padding-top-mini">
                        <div class="panel-box padding-b">
                            <div class="titles">
                                <h4>Trophy</h4>
                            </div>
                            <div class="row">
                                @foreach($tournament->image as $image)
                                    @if($image->type == 'trophy')
                                        <img class="image-ai" src="{{asset($image->image)}}" >
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12 padding-top-mini">
                            <div class="panel-box padding-b pull-left">
                                <div class="titles">
                                    <h4>Gellery</h4>
                                </div>

                                @foreach($tournament->image as $image)

                                        @if($image->type != 'logo' && $image->type != 'banner' && $image->type != 'poster' && $image->type != 'trophy' && $image->type != 'badge')
                                            <div class="col-md-3 pull-left">
                                                <img src="{{asset($image->image)}}" >
                                            </div>
                                        @endif

                                @endforeach

                            </div>
                        </div>
                    </div>

            </div>
            </div>
        </section>
        <!-- End Section Area -  Content Central -->
    </div>
    <!-- End layout-->


@stop